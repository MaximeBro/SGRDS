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

    public function delete_rattrapage($id)
    {
        $this->where('idrattrapage', $id);
        $this->delete('rattrapage');
    }

    public function getEtudiantsByRattrapage($id) {
        return $this->select('idetudiant')->where('idrattrapage', $id)->findAll();
    }
}
?>