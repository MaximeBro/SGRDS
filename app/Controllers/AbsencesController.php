<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenceEtudiantsModel;
use App\Models\AbsenceModel;
use App\Models\EtudiantModel;
use App\Models\RessourceModel;

class AbsencesController extends BaseController
{
    private $modele_etudiant = null;
    private $modele_ressource = null;
    private $modele_rattrapage = null;
    private $modele_absence = null;
    private $modele_absenceEtudiants = null;

    public function index(): void
    {
        helper(['form']);
        helper(['date']);

        $modele_etudiant = new EtudiantModel();
        $modele_ressource = new RessourceModel();

        $data['etudiants'] = $modele_etudiant->findAll();
        $data['ressources'] = $modele_ressource->findAll();

        echo view('common/header');
        echo view('Absences/FormSaisieAbsents', ['etudiants' => $data['etudiants'],
            'ressources' => $data['ressources'] ]);

        echo view('common/footer');
    }

    public function absences() {
        helper(['form']);
        helper(['date']);

        $modele_absence = new AbsenceModel();
        $modele_ressource = new RessourceModel();
        $modele_etudiant = new EtudiantModel();
        $modele_absenceEtudiants = new AbsenceEtudiantsModel();

        $absences = $modele_absence->findAll();
        $linked_etudiants = [];
        $ressources = [];
        $etudiants = [];
        $data['absences'] = $absences;

        foreach($absences as $absence) {
            $id = $absence['idabsence'];
            $ressources[$id] = $modele_ressource->getRessourceById($absence['idressource']);

            $linked_etudiants[$id] = $modele_absenceEtudiants->getEtudiantsById($id);

            foreach($linked_etudiants[$id] as $idEtu) {
                $etudiants[$idEtu['idetudiant']] = $modele_etudiant->getEtudiantById($idEtu['idetudiant']);
            }
        }

        $data['ressources'] = $ressources;
        $data['etudiants'] = $etudiants;
        $data['linked_etudiants'] = $linked_etudiants;

        echo view('common/header');
        echo view('Absences/ListeAbsences', $data);
        echo view('common/footer');
    }

    public function traitement()
    {
        helper(['form']);
        $validation = [
            'inputDate' => 'required|valid_date',
            'selectRessource' => 'required',
            'selectSemestre' => 'required',
            'selectEtudiants' => 'required'
        ];

        if($this->validate($validation))
        {
            $modele_absence = new AbsenceModel();
            $idAbsence = $modele_absence->insert_absence();


            $modele_absenceEtudiants = new AbsenceEtudiantsModel();
            $selectedEtudiants = $this->request->getVar('selectEtudiants');
            foreach($selectedEtudiants as $selectedEtudiant)
            {
                $data = [
                    'idabsence' => $idAbsence,
                    'idetudiant' => $selectedEtudiant
                ];
                $modele_absenceEtudiants->insert($data);
            }

            return redirect()->to('/accueil');
        }
        else
        {
            echo view('common/header');
            echo view('Absences/FormSaisieAbsents');
            echo view('common/footer');
        }
    }
}
