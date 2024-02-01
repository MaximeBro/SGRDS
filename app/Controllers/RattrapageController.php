<?php
    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\RattrapageModel;
    use App\Models\RessourceModel;
    use App\Models\UserModel;
    use App\Models\EtudiantModel;
    use App\Models\RattrapageEtudiantModel;
        
    class RattrapageController extends BaseController
    {
        public function index() {
            helper(["form"]);
            $modele_etudiant = new EtudiantModel();
            $modele_ressource = new RessourceModel();
            $modele_user = new UserModel();

            $data['etudiants'] = $modele_etudiant->findAll();
            $data['enseignants'] = $modele_user->getUsersByRole('enseignant');
            $data['ressources'] = $modele_ressource->findAll();

            echo view('common/header');
            echo view('RattrapageView', ['etudiants' => $data['etudiants'], 
                                         'enseignants' => $data['enseignants'],
                                         'ressources' => $data['ressources'] ]);
            echo view('common/footer');
        }

        public function saisie($semestre, $idressource, $idEtudiants) {

        }

        public function traitement() 
        {
            $rattrapageModel = new RattrapageModel();
            $idRattrapage = $rattrapageModel->insert_rattrapage();

            $rattrapageEtudiantModel = new RattrapageEtudiantModel();
            $selectedEtudiants = $this->request->getVar('selectEtudiants');
            foreach ($selectedEtudiants as $etudiant) {
                $data = [
                    'idrattrapage' => $idRattrapage,
                    'idetudiant' => $etudiant,
                    'estjustifie' => null,
                ];
                $rattrapageEtudiantModel->insert_etudiants($data);
            }

            return redirect('/accueil');
        }

        public function edit($id): void
        {
            helper(["form"]);

            echo view('common/header');
            echo view('RattrapageView', ['id' => $id]);
            echo view('common/footer');
        }
    }
?>