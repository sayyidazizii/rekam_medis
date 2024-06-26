<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_obat');
		if ($this->session->userdata('is_login') == false) {
			redirect('login');
		}
	}

	public function index()
	{
		$data_obat = $this->input->get('data_obat');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		if ($data_obat != null) {
			$data['data_obat'] = $this->M_obat->get_search_data($data_obat);
			$data['pencarian'] = $data_obat;
			$this->load->view('obat/obat', $data);
		} else {
			$data['data_obat'] = $this->M_obat->get_data();
			$data['pencarian'] = null;
			$this->load->view('obat/obat', $data);
		}

		$this->load->view('layout/footer');
	}

	//nomor obat
	public function numberObat()
    {
        $latest = $this->M_obat->latest();

        if (!$latest) {
            return 'OBT0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->kode_obat);

        return 'OBT' . sprintf('%04d', $string + 1);
    }

	public function tambah_obat()
	{
		$data['satuan'] = $this->M_obat->getSatuan();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('obat/add',$data);
		$this->load->view('layout/footer');
	}

	function simpan_obat()
	{
		$nama_obat 		= $this->input->post('nama_obat');
		$kategori 		= $this->input->post('kategori');
		$stok 			= $this->input->post('stok');
		$id_satuan 		= $this->input->post('id_satuan');
		$harga 			= $this->input->post('harga');
		$expired_date 	= $this->input->post('expired_date');
		$keterangan 	= $this->input->post('keterangan');

		$data_obat = array(
			'id_data_obat'	=> null,
			'nama_obat' 	=> $nama_obat,
			'kode_obat'		=> $this->numberObat(),
			'kategori'		=> $kategori,
			'id_satuan'		=> $id_satuan,
			'stok'			=> $stok,
			'harga' 		=> $harga,
			'expired_date' 	=> $expired_date,
			'keterangan' 	=> $keterangan
		);

		$this->M_obat->save_medicine($data_obat);
		redirect('obat');
	}

	function hapus_obat($id_obat)
	{
		$this->M_obat->delete($id_obat);
		redirect('obat');
	}

	function ubah_obat($id_obat)
	{
		$data['satuan'] = $this->M_obat->getSatuan();
		$data['data_obat'] = $this->M_obat->get_data_obat($id_obat);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('obat/edit', $data);
		$this->load->view('layout/footer');
	}

	function simpan_ubah_obat()
	{
		$id_obat		= $this->input->post('id_obat');
		$nama_obat 		= $this->input->post('nama_obat');
		$kategori 		= $this->input->post('kategori');
		$kode_obat 		= $this->input->post('kode_obat');
		$id_satuan 		= $this->input->post('id_satuan');
		$stok 			= $this->input->post('stok');
		$harga 			= $this->input->post('harga');
		$expired_date 	= $this->input->post('expired_date');
		$keterangan 	= $this->input->post('keterangan');

		$data_obat = array(
			'nama_obat' 	=> $nama_obat,
			'kode_obat'		=> $kode_obat,
			'kategori'		=> $kategori,
			'id_satuan'		=> $id_satuan,
			'stok'			=> $stok,
			'harga' 		=> $harga,
			'expired_date' 	=> $expired_date,
			'keterangan' 	=> $keterangan
		);

		$this->M_obat->save_update_medicine($id_obat, $data_obat);
		redirect('obat');
	}

	function detail_obat($id_obat)
	{
		$data['data_obat'] = $this->M_obat->get_data_obat($id_obat);
		$this->load->view('layout/header');
		$this->load->view('obat/detail', $data);
		$this->load->view('layout/footer');
	}
}
