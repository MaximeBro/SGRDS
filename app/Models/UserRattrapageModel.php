<?php
namespace App\Models;
use CodeIgniter\Model;

class UserRattrapageModel extends Model {
    protected $table = 'utilisateur_rattrapage';

    protected $allowedFields = [
        'idutilisateur',
        'idrattrapage',
        'daterattrapage',
        'horairerattrapage',
        'typerattrapage',
        'sallerattrapage',
        'semestre',
        'commentaire',
        'idressource'
    ];

    public function insert_rattrapage()
    {
        $request = \Config\Services::request();
        $data = [
            'daterattrapage' => $request->getPost('inputDate'),
            'semestre' => $request->getPost('selectSemestre'),
            'idressource' => $request->getPost('selectRessource'),
        ];

        $this->db->table($this->table)->insert($data);
    }

    public function getRessources()
    {
        $query = $this->db->query('SELECT * FROM ressource;');
        return $query->getResultArray();
    }
}
