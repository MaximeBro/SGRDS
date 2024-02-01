<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'utilisateur';

    protected $allowedFields = [
        'idutilisateur',
        'nomutilisateur',
        'prenomutilisateur',
        'emailutilisateur',
        'mdputilisateur',
        'role'
    ];

    public function getUserByEmail($email)
    {
        return $this->where('emailutilisateur', $email)->first();
    }

    public function getUserByName($name)
    {
        return $this->where('nomutilisateur', $name)->first();
    }

    public function modifierMotDePasse($email, $password)
    {
        $requete = $this->db->query("UPDATE utilisateur SET mdputilisateur = '$password' WHERE emailutilisateur = '$email'");
    }
    
    public function getUsersByRole($role) {
        return $this->where('role', $role)->findAll();
    }

    public function getMailById($id) {
        return $this->select('emailutilisateur')->where('idutilisateur', $id)->first();
    }
}
