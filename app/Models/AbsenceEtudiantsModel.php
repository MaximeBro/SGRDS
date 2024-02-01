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

    public function insert_absenceEtudiants()
    {
        $request = \Config\Services::request();
        $data = [
            'idetudiant' => $request->getPost('selectEtudiants[]'),

        ];

        $this->db->table($this->table)->insert($data);
    }
}
