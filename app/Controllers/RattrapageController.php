<?php
    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\RattrapageModel;
    use App\Models\RessourceModel;
    use App\Models\UserModel;
    use App\Models\EtudiantModel;
        
        class RattrapageController extends BaseController
        {
            $rattrapageModel = new RattrapageModel();
            $rattrapageModel->insert_rattrapage();

                $modele_etudiant = new EtudiantModel();
                $modele_ressource = new RessourceModel();
                $modele_user = new UserModel();

                $data['etudiants'] = $modele_etudiant->findAll();
                $data['ressources'] = $modele_ressource->findAll();
                $data['users'] = $modele_user->findAll();

                echo view('common/header');
                echo view('RattrapageView', ['etudiants' => $data['etudiants'], 
                                             'users' => $data['users'],
                                             'ressources' => $data['ressources'] ]);
                echo view('common/footer');
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