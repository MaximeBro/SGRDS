<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class PlanningController extends BaseController
{
    private $session = null;

    public function index(): void
    {
        $this->session = \Config\Services::session();
        $data['session'] = $this->session;

        echo view('common/header');
        echo view('Planning/content', $data);
        echo view('common/footer');
    }
}