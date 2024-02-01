<?php
namespace App\Models;
use CodeIgniter\Model;

class AbsenceModel extends Model {
    protected $table = 'absence';

    protected $allowedFields = [
        'idabsence',
        'daterattrapage',
        'semestre',
        'idressource'
    ];

    public function insert_absence()
    {
        $request = \Config\Services::request();
        $data = [
            'daterattrapage' => $request->getPost('inputDate'),
            'semestre' => $request->getPost('selectSemestre'),
            'idressource' => $request->getPost('selectRessource')
        ];

        $this->db->table($this->table)->insert($data);

        return $this->db->insertID();
    }
}
