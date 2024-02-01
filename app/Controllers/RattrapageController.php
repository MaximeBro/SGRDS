<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RattrapageModel;

class RattrapageController extends BaseController
{
    public function index(): void
    {
        helper(["form"]);

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

    public function edit($id): void
    {
        helper(["form"]);

        echo view('common/header');
        echo view('RattrapageView', ['id' => $id]);
        echo view('common/footer');
    }
}
?>