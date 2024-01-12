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

	public function tambah_obat()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('obat/add');
		$this->load->view('layout/footer');
	}

	function simpan_obat()
	{
		$nama_obat 		= $this->input->post('nama_obat');
		$kategori 		= $this->input->post('kategori');
		$stok 			= $this->input->post('stok');
		$harga 			= $this->input->post('harga');
		$keterangan 	= $this->input->post('keterangan');

		$data_obat = array(
			'id_data_obat'	=> null,
			'nama_obat' 	=> $nama_obat,
			'kategori'		=> $kategori,
			'stok'			=> $stok,
			'harga' 		=> $harga,
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
		$stok 			= $this->input->post('stok');
		$harga 			= $this->input->post('harga');
		$keterangan 	= $this->input->post('keterangan');

		$data_obat = array(
			'nama_obat' 	=> $nama_obat,
			'kategori'		=> $kategori,
			'stok'			=> $stok,
			'harga' 		=> $harga,
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
