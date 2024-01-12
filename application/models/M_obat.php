<?php

class M_obat extends CI_Model
{
    public $table = 'obat';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save_medicine($data_obat)
    {
        $this->db->insert($this->table, $data_obat);
    }

    function delete($id_obat)
    {
        $this->db->where('id_data_obat', $id_obat);
        $this->db->delete($this->table);
    }

    function get_data_obat($id_obat)
    {
        $this->db->where('id_data_obat', $id_obat);
        return $this->db->get($this->table)->row();
    }

    function save_update_medicine($id_obat, $data_obat)
    {
        $this->db->where('id_data_obat', $id_obat);
        $this->db->update($this->table, $data_obat);
    }

    function get_search_data($data_obat)
    {
        $this->db->like('nama_obat', $data_obat);
        $this->db->or_like('kategori', $data_obat);
        $this->db->or_like('harga', $data_obat);
        $this->db->or_like('keterangan', $data_obat);

        return $this->db->get($this->table)->result();
    }
}
