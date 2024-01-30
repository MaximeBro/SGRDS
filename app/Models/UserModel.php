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
}