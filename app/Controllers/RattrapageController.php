<?php
    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\RattrapageModel;
        
        class RattrapageController extends BaseController
        {
            public function index(): void
            {
                helper(["form"]);
                helper(["date"]);

                echo view('common/header');
                echo view('RattrapageView');
                echo view('common/footer');
            }

            public function traitement()
            {
                $validation = [
                    'inputDate' => 'required|valid_date',
                    'selectType' => 'required',
                    'selectDuree' => 'required',
                    'selectSemestre' => 'required',
                    'txtCommentaire' => 'required',
                ];
            
                // Récupérer la date postée et la formater
                $inputDate = $this->request->getVar('inputDate');
                
                $formattedDate = date('Y-m-d', strtotime($inputDate));
            
                if ($this->validate($validation))
                {   
                    $rattrapageModel = new RattrapageModel();
                    $rattrapageModel->insert_rattrapage();
            
                    return redirect()->to('/accueil');
                }
                else
                {
                    echo view('common/header');
                    echo view('RattrapageView');
                    echo view('common/footer');
                }
            }
        }
    ?>