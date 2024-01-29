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

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/accueil');
            } else {
                $session->setFlashdata('error', 'Password incorrect.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('error', 'Email incorrect.');
            return redirect()->to('/');
        }
    }
}