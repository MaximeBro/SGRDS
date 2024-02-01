<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenceModel;
use App\Models\EtudiantModel;
use App\Models\RessourceModel;
use App\Models\AbsenceEtudiantsModel;

class SaisieAbsentsController extends BaseController
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

        echo view('common/header');

        $modele_etudiant = new EtudiantModel();
        $modele_ressource = new RessourceModel();

        $data['etudiants'] = $modele_etudiant->findAll();
        $data['ressources'] = $modele_ressource->findAll();

        echo view('SaisieAbsents/FormSaisieAbsents', ['etudiants' => $data['etudiants'],
                                                      'ressources' => $data['ressources'] ]);

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
        }else
        {
            echo view('common/header');
            echo view('SaisieAbsents/FormSaisieAbsents');
            echo view('common/footer');
        }
    }
}
