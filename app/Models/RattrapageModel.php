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

        public function insert_rattrapage()
        {
            $request = \Config\Services::request();
            $data = [
                'daterattrapage' => $request->getPost('inputDate'),
                'typerattrapage' => $request->getPost('selectType'),
                'dureerattrapage' => $request->getPost('selectDuree'),
                'commentairerattrapage' => $request->getPost('txtCommentaire'),
                'idressource' => $request->getPost('selectRessource'),
                'idenseignant' => $request->getPost('selectProfesseur'),
                'semestre' => $request->getPost('selectSemestre'),
            ];

            $this->db->table($this->table)->insert($data);

            return $this->db->insertID();
        }

        public function deleteById($id)
        {
            return $this->builder()->where('idrattrapage', $id)->delete();
        }

        public function getById($id) {
            return $this->where('idrattrapage', $id)->first();
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