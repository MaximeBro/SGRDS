<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class RattrapageModel extends Model
    {
        protected $table = 'rattrapage';

        protected $allowedFields = [
            'idrattrapage',
            'daterattrapage',
            'typerattrapage',
            'dureerattrapage',
            'commentairerattrapage',
            'semestre',
            'idressource',
            'idenseignant'];

        public function insert_rattrapage($data) 
        {
            $this->insert('rattrapage', $data);
            return $this->insert_id();
        }

        public function delete_rattrapage($id)
        {
            $this->where('idrattrapage', $id);
            $this->delete('rattrapage');
        }

        public function getByRessource($ressource) {
            return $this->where('idressource', $ressource)->findAll();
        }

        public function getBySemestre($semestre) {
            return $this->where('semestre', $semestre)->findAll();
        }

        public function getByRessourceAndSemestre($ressource, $semestre) {
            $array = array('idressource' => $ressource, 'semestre' => $semestre);
            return $this->where($array)->findAll();
        }
    }
?>