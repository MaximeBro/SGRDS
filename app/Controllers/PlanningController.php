<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RattrapageEtudiantModel;
use App\Models\EtudiantModel;
use App\Models\RattrapageModel;
use App\Models\RessourceModel;

class PlanningController extends BaseController
{
    private $session = null;
    private $ressourceModel = null;
    private $rattrapageModel = null;
    private $etudiantModel = null;
    private $rattrapageEtudiantModel = null;

    public function index(): void
    {
        helper(['form']);
        $data = $this->loadViewData();

        if($this->isLoggedIn()) {
            echo view('common/header');
            echo view('Planning/content', $data);
            echo view('common/footer');
        }
    }

    private function loadViewData($ressource = null, $semestre = null): array
    {
        $ressourceModel = new RessourceModel();
        $rattrapageModel = new RattrapageModel();
        $etudiantModel = new EtudiantModel();
        $rattrapageEtudiantModel = new RattrapageEtudiantModel();
        $this->session = \Config\Services::session();

        $rattrapages = $rattrapageModel->findAll();

        if(!empty($ressource) && !empty($semestre)) {
            $rattrapages = $rattrapageModel->getByRessourceAndSemestre($ressource, $semestre);
        }
        else {
            if(!empty($ressource)) {
                $rattrapages = $rattrapageModel->getByRessource($ressource);
            }

            if(!empty($semestre)) {
                $rattrapages = $rattrapageModel->getBySemestre($semestre);
            }
        }

        foreach($rattrapages as $rattrapage) {
            $idRattrapage = $rattrapage['idrattrapage'];
            $idRessource = $rattrapage['idressource'];

            $eleves = $rattrapageEtudiantModel->getEtudiantsByRattrapage($idRattrapage);

            $linked_resources[$idRessource] = $ressourceModel->getRessourceById($idRessource);
            $linked_students[$idRattrapage] = $eleves;

            foreach($eleves as $eleve) {
                $idEtudiant = $eleve['idetudiant'];
                $students[$idEtudiant] = $etudiantModel->getEtudiantById($idEtudiant);
            }
        }

        $data['session'] = $this->session;
        $data['ressources'] = $ressourceModel->getRessources();
        $data['rattrapages'] = $rattrapages;

        if(!empty($linked_resources)) { $data['linked_resources'] = $linked_resources; }
        if(!empty($linked_students)) { $data['linked_students'] = $linked_students; }
        if(!empty($students)) { $data['students'] = $students; }

        return $data;
    }

    public function filter(): void
    {
        helper(['form']);
        $selectedRessource = $this->request->getVar('selectedRessource');
        $selectedSemestre = $this->request->getVar('selectedSemestre');
        $data = $this->loadViewData($selectedRessource, $selectedSemestre);

        if($this->isLoggedIn()) {
            echo view('common/header');
            echo view('Planning/content', $data);
            echo view('common/footer');
        }
    }

    public function isLoggedIn()
    {
        $session = \Config\Services::session();
        if($session->get('isLoggedIn') === FALSE) {
            return redirect('/');
        }

        return true;
    }

    public function edit($id) {

    }

    public function delete($id): \CodeIgniter\HTTP\RedirectResponse
    {
        $rattrapageModel = new RattrapageModel();
        $rattrapageEtudiantModel = new RattrapageEtudiantModel();

        $rattrapage = $rattrapageModel->getById($id);
        $rattrapageEtudiantModel->deleteById($rattrapage['idrattrapage']);
        $rattrapageModel->deleteById($rattrapage['idrattrapage']);

        return redirect()->to('/accueil');
    }
}