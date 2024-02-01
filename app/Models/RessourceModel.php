<?php
namespace App\Models;
use CodeIgniter\Model;

class RessourceModel extends Model
{
    protected $table = 'ressource';

    protected $allowedFields = ['idressource',
                                'nomressource'];

    public function getRessources() {
        return $this->select("*")->orderBy("nomressource")->get()->getResultArray();
    }

    public function getRessourceById($id) {
        return $this->where('idressource', $id)->first();
    }
}
