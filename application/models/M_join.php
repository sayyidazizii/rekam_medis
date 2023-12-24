<?php

    class M_join extends CI_Model
    {
        public function get_user()
        {
            $query = $this->db->get('user');
            return $query->result();
        }
        public function get_level(){
            $query = $this->db->get('level');
            return $query->result();
        }

        public function get_join()
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('level','user.id_level = level.id_level');
            $query = $this->db->get();
            return $query->result(); 
        }
        
    }
    
?>