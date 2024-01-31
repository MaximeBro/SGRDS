<?php
namespace App\Models;
use CodeIgniter\Model;

class EtudiantModel extends Model {
    protected $table = 'etudiant';

    protected $allowedFields = [
        'idetudiant',
        'nometudiant',
        'prenometudiant',
        'emailetudiant'
    ];

    public function getUserByEmail($email)
    {
        return $this->where('emailetudiant', $email)->first();
    }

    public function getUserByName($name)
    {
        return $this->where('nometudiant', $name)->first();
    }
}
