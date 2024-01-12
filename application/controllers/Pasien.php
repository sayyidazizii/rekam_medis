<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
			$this->load->model('M_pasien');
			if ($this->session->userdata('is_login') == false){
				redirect('login');
			}
    }

    public function index()
	{
		$data_pasien = $this->input->get('data_pasien');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		if ($data_pasien != null) {
			$data['data_pasien'] = $this->M_pasien->get_search_data($data_pasien);
			$data['pencarian'] = $data_pasien;
			$this->load->view('pasien', $data);
		} else {
			$data['data_pasien'] = $this->M_pasien->get_data();
			$data['pencarian'] = null;
			$this->load->view('pasien', $data);
		}

		$this->load->view('layout/footer');
	}

    public function tambah_pasien()
    {
        $this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('add_pasien');
		$this->load->view('layout/footer');
    }

	function simpan_pasien() {
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

		$this->M_pasien->save_patient($data_pasien);
		redirect('pasien');
	}

	function hapus_pasien($id_pasien) {
		$this->M_pasien->soft_delete($id_pasien);
		redirect('pasien');
	}

	function ubah_pasien($id_pasien) {
		$data['data_pasien'] = $this->M_pasien->get_data_pasien($id_pasien);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('edit_pasien', $data);
		$this->load->view('layout/footer');
	}

	function simpan_ubah_pasien() {
		$id_pasien		= $this->input->post('id_pasien');
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

		$this->M_pasien->save_update_patient($id_pasien, $data_pasien);
		redirect('pasien');
	}

}