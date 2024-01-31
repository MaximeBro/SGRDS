<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class RattrapageModel extends Model
    {
        protected $table = 'rattrapage';
        protected $allowedFields = [
                                    'daterattrapage', 
                                    'typerattrapage', 
                                    'dureerattrapage', 
                                    'commentairerattrapage',
                                    'semestre'
                                ];
        
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
            $this->db->where('idrattrapage', $id);
            $this->db->delete('rattrapage');
        }
    }
?>