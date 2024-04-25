<?php

class M_rekamMedis extends CI_Model
{
    public $table = 'rekam_medis';

    function get_data()
    {
        // return $this->db->get($this->table)->result();

         // Lakukan join dengan tabel pasien
         $this->db->select('rekam_medis.*, pasien.nama_pasien, pasien.no_kartu');
         $this->db->from($this->table);
         $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien', 'left');
         return $this->db->get()->result();
    }

    function save($data_rekam_medis)
    {
        $this->db->insert($this->table, $data_rekam_medis);
    }

    //Jasa
    function save_jasa($data_rekam_medis_tarif)
    {
        $this->db->insert('rekam_medis_tarif', $data_rekam_medis_tarif);
    }

    //obat
    function save_obat($data_rekam_medis_obat)
    {
        $this->db->insert('rekam_medis_obat', $data_rekam_medis_obat);
    }

    function delete($id_rekam_medis)
    {
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $this->db->delete($this->table);
    }

    function get_data_rekamMedis($id_rekam_medis)
    {
        // $this->db->where('id_rekam_medis', $id_rekam_medis);
        // return $this->db->get($this->table)->row();

        $this->db->select('rekam_medis.*, pasien.nama_pasien, pasien.no_kartu');
        $this->db->from($this->table);
        $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien', 'left');
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        return $this->db->get()->row();
    }

    function save_update($id_rekam_medis, $data_rekam_medis)
    {
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $this->db->update($this->table, $data_rekam_medis);
    }


    //pending code
    function get_search_data($data_search)
    {
        $this->db->select('rekam_medis.*, pasien.nama_pasien, pasien.no_kartu');
        $this->db->from($this->table);
        $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien', 'left');
        $this->db->group_start(); // Mulai kelompok klausa OR
        $this->db->like('rekam_medis.no_rm', $data_search);
        $this->db->like('pasien.no_kartu', $data_search);
        $this->db->or_like('pasien.nama_pasien', $data_search);
        $this->db->or_like('rekam_medis.amnesa', $data_search);
        $this->db->or_like('rekam_medis.diagnosa', $data_search);
        $this->db->or_like('rekam_medis.tanggal_periksa', $data_search);
        $this->db->or_like('rekam_medis.tindakan', $data_search);
        $this->db->group_end(); // Akhiri kelompok klausa OR
        return $this->db->get()->result();
    }

    function latest()
    {
        $this->db->select('rekam_medis.*');
        $this->db->from($this->table);
        $this->db->order_by('rekam_medis.id_rekam_medis', 'DESC');
        return $this->db->get()->row();
    }
    
    function get_data_obat($id_rekam_medis)
    {
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        return $this->db->get('rekam_medis_obat')->result();
    }

    function get_data_tarif($id_rekam_medis)
    {
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        return $this->db->get('rekam_medis_tarif')->result();
    }


    public function report($start_date,$end_date)
    {
         $this->db->select('rekam_medis.*, pasien.nama_pasien, pasien.no_kartu');
         $this->db->from($this->table);
         $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien', 'left');
         $this->db->where('rekam_medis.tanggal_periksa >=', $start_date);
         $this->db->where('rekam_medis.tanggal_periksa <=', $end_date);
        return $this->db->get()->result();
    }

    public function count_rekam_medis_per_day()
    {
        // Dapatkan tanggal awal dan akhir dari bulan ini
        $start_date = date('Y-01-01');
        $end_date = date('Y-m-t');

        // Query untuk menghitung jumlah rekam medis per hari pada bulan ini
        $this->db->select('tanggal_periksa, COUNT(*) as jumlah_rekam_medis');
        $this->db->from('rekam_medis');
        $this->db->where('tanggal_periksa >=', $start_date);
        $this->db->where('tanggal_periksa <=', $end_date);
        $this->db->group_by('tanggal_periksa');
        $query = $this->db->get();

        return $query->result();
    }
}
