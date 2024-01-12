<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_tarif');
		if ($this->session->userdata('is_login') == false) {
			redirect('login');
		}
	}

	public function index()
	{
		$data_tarif = $this->input->get('data_tarif');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		if ($data_tarif != null) {
			$data['data_tarif'] = $this->M_tarif->get_search_data($data_tarif);
			$data['pencarian'] = $data_tarif;
			$this->load->view('tarif/tarif', $data);
		} else {
			$data['data_tarif'] = $this->M_tarif->get_data();
			$data['pencarian'] = null;
			$this->load->view('tarif/tarif', $data);
		}

		$this->load->view('layout/footer');
	}

	public function tambah_tarif()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('tarif/add');
		$this->load->view('layout/footer');
	}

	function simpan_tarif()
	{
		$nama_jasa 		= $this->input->post('nama_jasa');
		$harga 			= $this->input->post('harga');
		$keterangan 	= $this->input->post('keterangan');

		$data_tarif = array(
			'id_data_tarif'	=> null,
			'nama_jasa' 	=> $nama_jasa,
			'harga' 		=> $harga,
			'keterangan' 	=> $keterangan
		);

		$this->M_tarif->save_tax($data_tarif);
		redirect('tarif');
	}

	function hapus_tarif($id_tarif)
	{
		$this->M_tarif->delete($id_tarif);
		redirect('tarif');
	}

	function ubah_tarif($id_tarif)
	{
		$data['data_tarif'] = $this->M_tarif->get_data_tarif($id_tarif);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('tarif/edit', $data);
		$this->load->view('layout/footer');
	}

	function simpan_ubah_tarif()
	{
		$id_tarif		= $this->input->post('id_tarif');
		$nama_jasa 		= $this->input->post('nama_jasa');
		$harga 			= $this->input->post('harga');
		$keterangan 	= $this->input->post('keterangan');

		$data_tarif = array(
			'nama_jasa' 	=> $nama_jasa,
			'harga' 		=> $harga,
			'keterangan' 	=> $keterangan
		);

		$this->M_tarif->save_update_tax($id_tarif, $data_tarif);
		redirect('tarif');
	}

	function detail_tarif($id_tarif)
	{
		$data['data_tarif'] = $this->M_tarif->get_data_tarif($id_tarif);
		$this->load->view('layout/header');
		$this->load->view('tarif/detail', $data);
		$this->load->view('layout/footer');
	}
}
