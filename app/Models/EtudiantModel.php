<?php
namespace App\Models;
use CodeIgniter\Model;

class EtudiantModel extends Model {
    protected $table = 'etudiant';

    protected $allowedFields = [
        'dateRattrapage',
        'idRessource',
        'semestreRattrapage',
        'idEtudiant'
    ];

    public function insert_rattrapage()
    {
        $request = \Config\Services::request();

        $data = [
            'idetudiant' => $request->getPost('etudiants'),
            'idressource' => $request->getPost('ressource'),
            'daterattrapage' => $request->getPost('inputDate'),
            'semestrerattrapage' => $request->getPost('semestre')
        ];


    }
    public function delete_rattrapage($id)
    {
        $this->where('idrattrapage', $id);
        $this->delete('rattrapage');
    }
    public function getEtudiantById($id) {
        return $this->where('idetudiant', $id)->first();

    }
}