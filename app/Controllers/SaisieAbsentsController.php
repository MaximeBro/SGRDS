<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EtudiantModel;
use App\Models\RessourceModel;
use App\Models\UserRattrapageModel;

class SaisieAbsentsController extends BaseController
{

    private $modele_etudiant = null;
    private $modele_ressource = null;
    private $modele_rattrapage = null;

    public function index(): void
    {
        helper(['form']);
        helper(['date']);

        echo view('common/header');

        $modele_etudiant = new EtudiantModel();
        $modele_ressource = new RessourceModel();
        $modele_rattrapage = new UserRattrapageModel();

        $data['etudiants'] = $modele_etudiant->findAll();
        $data['ressources'] = $modele_ressource->findAll();

        echo view('SaisieAbsents/FormSaisieAbsents', ['etudiants' => $data['etudiants'], 'ressources' => $data['ressources']]);

        echo view('common/footer');
    }

    public function traitement()
    {
        helper(['form']);
        $validation = [
            'inputDate' => 'required|valid_date',
            'ressource' => 'required',
            'selectSemestre' => 'required',
            'etudiants' => 'required'
        ];

        if($this->validate($validation))
        {
            $modele_rattrapage = new UserRattrapageModel();
            $modele_rattrapage->insert_rattrapage();

            return redirect()->to('/accueil');
        }else
        {
            echo view('common/header');
            echo view('SaisieAbsents/FormSaisieAbsents');
            echo view('common/footer');
        }
    }
}
