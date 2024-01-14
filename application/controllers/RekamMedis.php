<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekamMedis');
		if ($this->session->userdata('is_login') == false) {
			redirect('login');
		}
	}

	public function index()
	{
		$data_rekam_medis = $this->input->get('data_rekam_medis');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		if ($data_rekam_medis != null) {
			$data['data_rekam_medis']   = $this->M_rekamMedis->get_search_data($data_rekam_medis);
			$data['pencarian']          = $data_rekam_medis;
			$this->load->view('rekam_medis/rekam_medis', $data);
		} else {
			$data['data_rekam_medis']   = $this->M_rekamMedis->get_data();
			$data['pencarian']          = null;
			$this->load->view('rekam_medis/rekam_medis', $data);
		}

		$this->load->view('layout/footer');
	}

	public function tambah_rekam_medis()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('rekam_medis/add');
		$this->load->view('layout/footer');
	}

	function simpan_rekam_medis()
	{
		$no_kartu 		= $this->input->post('no_kartu');
		$nama_pasien 	= $this->input->post('nama_pasien');
		$alamat 		= $this->input->post('alamat');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$no_hp			= $this->input->post('no_hp');
		$umur			= $this->input->post('umur');
		$pekerjaan		= $this->input->post('pekerjaan');

		$data_pasien = array(
			'id_pasien' 	=> null,
			'no_kartu'		=> $no_kartu,
			'nama_pasien'	=> $nama_pasien,
			'jenis_kelamin'	=> $jenis_kelamin,
			'umur'			=> $umur,
			'no_telepon'	=> $no_hp,
			'alamat'		=> $alamat,
			'pekerjaan'		=> $pekerjaan,
			'data_state'	=> 0
		);

		$this->M_rekamMedis->save_patient($data_pasien);
		redirect('RekamMedis');
	}

	function hapus_rekam_medis($id_rekam_medis)
	{
		$this->M_rekamMedis->soft_delete($id_rekam_medis);
		redirect('RekamMedis');
	}

	function ubah_rekam_medis($id_rekam_medis)
	{
		$data['data_pasien'] = $this->M_rekamMedis->get_data_pasien($id_rekam_medis);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pasien/edit', $data);
		$this->load->view('layout/footer');
	}

	function update_rekam_medis()
	{
		$id_pasien		= $this->input->post('id_pasien');
		$no_kartu 		= $this->input->post('no_kartu');
		$nama_pasien 	= $this->input->post('nama_pasien');
		$alamat 		= $this->input->post('alamat');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$no_hp			= $this->input->post('no_hp');
		$umur			= $this->input->post('umur');
		$pekerjaan		= $this->input->post('pekerjaan');

		$data_pasien = array(
			'no_kartu'		=> $no_kartu,
			'nama_pasien'	=> $nama_pasien,
			'jenis_kelamin'	=> $jenis_kelamin,
			'umur'			=> $umur,
			'no_telepon'	=> $no_hp,
			'alamat'		=> $alamat,
			'pekerjaan'		=> $pekerjaan,
			'data_state'	=> 0
		);

		$this->M_rekamMedis->save_update_patient($id_pasien, $data_pasien);
		redirect('pasien');
	}

	function detail_rekam_medis($id_pasien)
	{
		$data['data_pasien'] = $this->M_rekamMedis->get_data_pasien($id_pasien);
		$this->load->view('layout/header');
		$this->load->view('pasien/detail', $data);
		$this->load->view('layout/footer');
	}
}
