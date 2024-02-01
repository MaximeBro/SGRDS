<?php
namespace App\Models;
use CodeIgniter\Model;

class EleveModel extends Model
{
    protected $table = 'utilisateur_rattrapage';

    protected $allowedFields = [
        'idenseignant',
        'idrattrapage',
        'daterattrapage',
        'horairerattrapage',
        'typerattrapage',
        'sallerattrapage',
        'commentaire'
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

    public function getElevesByRattrapage($id) {
        return $this->where('idrattrapage', $id)->findAll();
    }
}
?>