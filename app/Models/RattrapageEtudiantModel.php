<?php
namespace App\Models;
use CodeIgniter\Model;

class RattrapageEtudiantModel extends Model
{
    protected $table = 'rattrapage_etudiant';

    protected $allowedFields = [
        'idrattrapage',
        'idetudiant',
        'estjustifie'
    ];

    public function insert_etudiants($data) {
        $this->db->table($this->table)->insert($data);
    }

    public function insert_data($data)
    {
        $this->insert('utilisateur_rattrapage', $data);
        return $this->insert_id();
    }

    public function deleteById($id)
    {
        return $this->builder()->where('idrattrapage', $id)->delete();
    }

    public function deleteByIdEtu($id)
    {
        return $this->builder()->where('idetudiant', $id)->delete();
    }

    public function getEtudiantsByRattrapage($id) {
        return $this->select('idetudiant')->where('idrattrapage', $id)->findAll();
    }
}
?>