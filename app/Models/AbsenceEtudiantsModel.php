<?php
namespace App\Models;
use CodeIgniter\Model;

class AbsenceEtudiantsModel extends Model {
    protected $table = 'absence_etudiants';

    protected $allowedFields = [
        'idabsenceetudiants',
        'idabsence',
        'idetudiant',
    ];

    public function getEtudiantsById($id) {
        return $this->select('idetudiant')->where('idabsence', $id)->findAll();
    }
}
