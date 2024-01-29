<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index(): void
    {
        echo view('Login/header');
        echo view('Login/form');
        echo view('Login/footer');
    }
}