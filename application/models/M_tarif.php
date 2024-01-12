<?php

class M_tarif extends CI_Model
{
    public $table = 'tarif';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save_tax($data_tarif)
    {
        $this->db->insert($this->table, $data_tarif);
    }

    function delete($id_tarif)
    {
        $this->db->where('id_data_tarif', $id_tarif);
        $this->db->delete($this->table);
    }

    function get_data_tarif($id_tarif)
    {
        $this->db->where('id_data_tarif', $id_tarif);
        return $this->db->get($this->table)->row();
    }

    function save_update_tax($id_tarif, $data_tarif)
    {
        $this->db->where('id_data_tarif', $id_tarif);
        $this->db->update($this->table, $data_tarif);
    }

    function get_search_data($data_tarif)
    {
        $this->db->like('nama_jasa', $data_tarif);
        $this->db->or_like('harga', $data_tarif);
        $this->db->or_like('keterangan', $data_tarif);

        return $this->db->get($this->table)->result();
    }
}
