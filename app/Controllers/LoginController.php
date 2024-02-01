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
            if(password_verify($password, $data['mdputilisateur'])) {
                $ses_data = ['id' => $data['idutilisateur'],
                            'name' => $data['prenomutilisateur'].' '.$data['nomutilisateur'],
                            'email' => $data['emailutilisateur'],
                            'role' => $data['role'],
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

    public function motDePasseOublie($email)
    {
        $mail = $email;

        $setEmail = \Config\Services::email();
        $setEmail->setTo($mail);

        $password = $this->genererChaineAleatoire(8);

        $message = 'Bonjour, voici votre nouveau mot de passe : '.$password;
        $message .= '<br/>Veuillez le conserver car il reste impossible de le modifier.';
        $message .= '<br/><br/>Cordialement,';

        $setEmail->setSubject('Mot de passe oublié');
        $setEmail->setMessage($message);

        if($setEmail->send())
        {
            $session = session();
            $session->setFlashdata('error', 'Email envoyé avec succès.');

            $userModel = new UserModel();

            $userModel->modifierMotDePasse($mail, $password);

            return redirect()->to('/');
        }
        else
        {
            $session = session();
            $session->setFlashdata('error', 'Erreur lors de l\'envoi de l\'email.');
        
            return redirect()->to('/');
        }

    }

    public function genererChaineAleatoire($nbCaractere)
    {
        $chaine = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $nbLettres = strlen($chaine) - 1;
        $generation = '';

        for($i=0; $i < $nbCaractere; $i++)
        {
            $pos = mt_rand(0, $nbLettres);
            $car = $chaine[$pos];
            $generation .= $car;
        }

        return $generation;
    }
}