<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class RattrapageModel extends CI_Model 
    {
        public function insert_rattrapage($data) 
        {
            $this->db->insert('rattrapage', $data);

            return $this->db->insert_id();
        }

        public function delete_rattrapage($id)
        {
            $this->db->where('idrattrapage', $id);
            $this->db->delete('rattrapage');
        }
    }
?>