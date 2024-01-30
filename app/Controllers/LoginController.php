<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index(): void
    {
        helper(['form']);

        echo view('Login/header');
        echo view('Login/form');
        echo view('Login/footer');
    }

    public function loginAuth(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('emailutilisateur', $email)->first();

        if ($data) {
            $pass = $data['mdputilisateur'];
            if($password === $pass) {
                $ses_data = ['id' => $data['idutilisateur'],
                            'name' => $data['prenomutilisateur'].' '.$data['nomutilisateur'],
                            'email' => $data['emailutilisateur'],
                            'isLoggedIn' => TRUE];

                $session->set($ses_data);
                return redirect()->to('/accueil');
            } else {
                $session->setFlashdata('error', 'Mot de passe incorrect.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('error', 'Email incorrect.');
            return redirect()->to('/');
        }
    }
}