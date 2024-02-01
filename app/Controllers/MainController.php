<?php
    namespace App\Controllers;

    class MainController extends BaseController
    {
        public function index()
        {
            echo view('common/header');
            echo view('common/footer');
        }

        public function disconnect(): \CodeIgniter\HTTP\RedirectResponse
        {
            $session = \Config\Services::session();
            $session->set('id', null);
            $session->set('name', null);
            $session->set('email', null);
            $session->set('role', null);
            $session->set('isLoggedIn', FALSE);
            $session->close();

            return redirect('/');
        }
    }
?>