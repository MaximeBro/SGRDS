<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RessourceModel;

class PlanningController extends BaseController
{
    private $session = null;
    private $model = null;

    public function index(): void
    {
        $model = new RessourceModel();
        $this->session = \Config\Services::session();
        $data['session'] = $this->session;
        $data['ressources'] = $model->getRessources();

        echo view('common/header');
        echo view('Planning/content', $data);
        echo view('common/footer');
    }
}