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

    public function getEtudiantById($id) {
        return $this->where('idetudiant', $id)->first();
    }

    public function getMailById($id) {
        return $this->where('idetudiant', $id)->first();
    }
}