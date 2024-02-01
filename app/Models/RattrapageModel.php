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
                'semestre' => $request->getPost('selectSemestre'),
            ];

            $this->db->table($this->table)->insert($data);
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