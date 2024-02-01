<?php
namespace App\Models;
use CodeIgniter\Model;

class EtudiantModel extends Model
{
    protected $table = 'etudiant';

    protected $allowedFields = [
        'idetudiant',
        'nometudiant',
        'prenometudiant',
        'emailetudiant'
    ];

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

    public function getEtudiantById($id) {
        return $this->where('idetudiant', $id)->first();
    }
}
?>