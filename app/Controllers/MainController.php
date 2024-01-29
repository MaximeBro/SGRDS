<?php
    namespace App\Controllers;

    class MainController extends BaseController
    {
        public function index()
        {
            echo view('common/header');
            echo view('common/footer');
        }
    }
?>