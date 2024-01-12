<?php

class M_pasien extends CI_Model
{
    public $table = 'pasien';

    function get_data()
    {
        return $this->db->get_where($this->table, array('data_state' => 0))->result();
    }

    function save_patient($data_pasien)
    {
        $this->db->insert($this->table, $data_pasien);
    }

    function soft_delete($id_pasien)
    {
        $this->db->where('id_pasien', $id_pasien);
        $this->db->update($this->table, array('data_state' => 1));
    }

    function get_data_pasien($id_pasien)
    {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->get($this->table)->row();
    }

    function save_update_patient($id_pasien, $data_pasien)
    {
        $this->db->where('id_pasien', $id_pasien);
        $this->db->update($this->table, $data_pasien);
    }

    function get_search_data($data_pasien)
    {
        $this->db->like('no_kartu', $data_pasien);
        $this->db->or_like('nama_pasien', $data_pasien);
        $this->db->or_like('no_telepon', $data_pasien);
        $this->db->or_like('alamat', $data_pasien);
        $this->db->or_like('pekerjaan', $data_pasien);

        return $this->db->get($this->table)->result();
    }
}
