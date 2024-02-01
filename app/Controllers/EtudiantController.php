<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\EtudiantModel;

class EtudiantController extends Controller
{
    public function index()
    {
        $model = new EtudiantModel();
        $data['etudiants'] = $model->orderBy('idetudiant')->findAll();

        echo view('common/header');
        echo view('Etudiants', $data);
        echo view('common/footer');
    }
    public function importCsvToDb()
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        ]);
        if (!$input) {
            $data['validation'] = $this->validator;
            return view('index', $data); 
        }else{
            if($file = $this->request->getFile('file')) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('../public/csvfile', $newName);
                $file = fopen("../public/csvfile/".$newName,"r");
                $i = 0;
                $numberOfFields = 3;
                $csvArr = array();
                
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    if($i > 0 && $num == $numberOfFields){ 
                        $csvArr[$i]['nometudiant'] = $filedata[0];
                        $csvArr[$i]['prenometudiant'] = $filedata[1];
                        $csvArr[$i]['emailetudiant'] = $filedata[2];
                    }
                    $i++;
                }
                fclose($file);
                $count = 0;
                foreach($csvArr as $userdata){
                    $students = new EtudiantModel();
                    $findRecord = $students->where('emailetudiant', $userdata['emailetudiant'])->countAllResults();
                    if($findRecord == 0){
                        if($students->insert($userdata)){
                            $count++;
                        }
                    }
                }
                session()->setFlashdata('message', $count.' étudiants ajouté avec succès.');
                session()->setFlashdata('alert-class', 'alert-success');
            }
            else{
                session()->setFlashdata('message', 'Le fichier CSV n\'a pas pu être importé.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            }else{
            session()->setFlashdata('message', 'Le fichier CSV n\'a pas pu être importé');
            session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
        return redirect()->to('/accueil');         
    }

    public function delete($id)
    {
        $model = new EtudiantModel();
        $model->deleteById($id);
        return redirect()->to('/etudiants');
    }
}