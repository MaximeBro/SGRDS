<?php
    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\RattrapageModel;
    use App\Models\RessourceModel;
    use App\Models\UserModel;
    use App\Models\EtudiantModel;
    use App\Models\RattrapageEtudiantModel;
    use App\Models\AbsenceEtudiantsModel;
        
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
                                         'ressources' => $data['ressources'],
                                         ]);
            echo view('common/footer');
        }

        public function saisie($semestre, $idressource, $idabsence) {
            helper(["form"]);

            $modele_user = new UserModel();
            $modele_ressource = new RessourceModel();
            $modele_absence_etudiants = new AbsenceEtudiantsModel();
            $modele_etudiant = new EtudiantModel();

            $data['enseignants'] = $modele_user->getUsersByRole('enseignant');

            $data['semestre'] = $semestre;

            $data['ressources'] = $modele_ressource->findAll();
            $data['idressource'] = $idressource;
            $etudiants = array();

            // get all stutends from absenceetudiants with idabsence
            $idEtuAbs = $modele_absence_etudiants->getEtudiantsById($idabsence);
            foreach ($idEtuAbs as $idEtu) {
                $etudiants[$idEtu['idetudiant']] = ($modele_etudiant->getEtudiantById($idEtu['idetudiant']));
            }

            $data['etudiants'] = $etudiants;

            echo view('common/header');
            echo view('RattrapageView', ['etudiants' => $data['etudiants'], 
                                         'enseignants' => $data['enseignants'],
                                         'ressources' => $data['ressources'],
                                         'semestre' => $data['semestre'],
                                         'idressource' => $data['idressource'],
                                        ]);
            echo view('common/footer');
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
            
            if ($this->request->getPost('cbMail')) {
                $this->sendMail($selectedEtudiants, $this->request->getPost('selectProfesseur'));
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

        public function sendMail($selectedEtudiants, $profConcerne)
        {
            var_dump($profConcerne);
            $session = \Config\Services::session();

            $modele_user = new UserModel();
            $mailProf = $modele_user->getMailById($profConcerne);

            $email = \Config\Services::email();

            $email->setFrom('');
            $email->setTo($mailProf);

            $etudiantModel = new EtudiantModel();
            foreach($selectedEtudiants as $id)
            {
                $etudiants[$id] = $etudiantModel->getEtudiantById($id);
            }

            $message = 'Bonjour, voici la liste des élèves dont leur absence a été justifiée :<ul> ';
            foreach ($etudiants as $etudiant) {
                $message .= '<li>'.$etudiant['nometudiant'].' '.$etudiant['prenometudiant'].'</li>';
            }
            $message .= '</ul><br/>Cordialement';
            
            if(count($selectedEtudiants) > 0)
                $email->setSubject('Absences justifiées');
            else
                $email->setSubject('Abence justifiée');

            var_dump($message);

            $email->setMessage($message);

            if($email->send())
            {
                $session->setFlashdata('success', 'Email envoyé avec succès.');
            }
            else
            {
                $session->setFlashdata('error', 'Erreur lors de l\'envoi de l\'email.');
            }
        }
    }
?>