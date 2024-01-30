<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class PlanningController extends BaseController
{
    public function index(): void
    {
        echo view('common/header');
        echo view('Planning/content');
        echo view('common/footer');
    }
}