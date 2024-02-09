<?php

class M_payment extends CI_Model
{
    public $table = 'pembayaran';

    function get_data()
    {   

        $this->db->select('pembayaran.*, pasien.nama_pasien, pasien.no_kartu');
        $this->db->from($this->table);
        $this->db->join('pasien', 'pembayaran.id_pasien = pasien.id_pasien', 'left');
        $this->db->where('pembayaran.data_state = 0');
        return $this->db->get()->result();
    }
    
    //list rekam medis
    function get_data_rekam_medis()
    {
         // Lakukan join dengan tabel pasien
         $this->db->select('rekam_medis.*, pasien.nama_pasien, pasien.no_kartu');
         $this->db->from('rekam_medis');
         $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien', 'left');
         $this->db->where('rekam_medis.status_bayar = 0');
         return $this->db->get()->result();
    }

    function save_payment($data_pembayaran)
    {
        $this->db->insert($this->table, $data_pembayaran);
    }

    //update status bayar
    function update_rekam_medis($id_rekam_medis)
    {
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $this->db->update('rekam_medis', array('status_bayar' => 1));
    }

    function soft_delete($id_pembayaran)
    {
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update($this->table, array('data_state' => 1));
    }

    function get_data_pembayaran($id_pembayaran)
    {
        $this->db->where('id_pembayaran', $id_pembayaran);
        return $this->db->get($this->table)->row();
    }

    function save_update($id_pembayaran, $data_pembayaran)
    {
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update($this->table, $data_pembayaran);
    }


    //pending code
    function get_search_data($data_pembayaran)
    {
        $this->db->like('no_kartu', $data_pembayaran);
        $this->db->or_like('nama_pasien', $data_pembayaran);
        $this->db->or_like('no_telepon', $data_pembayaran);
        $this->db->or_like('alamat', $data_pembayaran);
        $this->db->or_like('pekerjaan', $data_pembayaran);

        return $this->db->get($this->table)->result();
    }

    //report
    public function report($start_date,$end_date)
    {
        $this->db->select('pembayaran.*, pasien.nama_pasien, pasien.no_kartu');
        $this->db->from($this->table);
        $this->db->join('pasien', 'pembayaran.id_pasien = pasien.id_pasien', 'left');
        $this->db->where('pembayaran.data_state = 0');
        $this->db->where('pembayaran.tanggal_pembayaran >=',$start_date);
        $this->db->where('pembayaran.tanggal_pembayaran <=',$end_date);
        return $this->db->get()->result();
    }

}
