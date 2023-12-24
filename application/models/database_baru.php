<?php

class database_baru extends CI_Model{
    public function get_data()
    {
        return $this->db->get('data_diri')->result();
    }
}
?>
