<?php

class M_obat extends CI_Model
{
    public $table = 'obat';

    function get_data()
    {
        $this->db->select('obat.*, satuan.id_satuan, satuan.nama_satuan');
        $this->db->from($this->table);
        $this->db->join('satuan', 'satuan.id_satuan = obat.id_satuan', 'left');
        return $this->db->get()->result();
        // return $this->db->get($this->table)->result();
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

    function latest()
    {
        $this->db->select('obat.*');
        $this->db->from($this->table);
        $this->db->order_by('obat.id_data_obat', 'DESC');
        return $this->db->get()->row();
    }

    function getSatuan(){
        $this->db->select('satuan.*');
        $this->db->from('satuan');
        return $this->db->get()->result();
    }
}
