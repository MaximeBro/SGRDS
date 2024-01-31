<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\EtudiantModel;

class SaisieAbsentsController extends BaseController
{
    public function index(): void
    {
        echo view('common/header');

        $modele_etudiant = new EtudiantModel();

        $etudiants = $modele_etudiant->findAll();
        var_dump($etudiants);



        echo view('SaisieAbsents/FormSaisieAbsents',['etudiants' => $etudiants]);
        echo view('common/footer');
    }
}