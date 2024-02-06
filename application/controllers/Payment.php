<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekamMedis');
		$this->load->model('M_tarif');
		$this->load->model('M_obat');
		$this->load->model('M_pasien');
		$this->load->model('M_payment');

		if ($this->session->userdata('is_login') == false) {
			redirect('login');
		}
	}

	public function index()
	{
		$data_payment = $this->input->get('data_payment');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		if ($data_payment != null) {
			$data['data_payment']       = $this->M_payment->get_search_data($data_payment);
			$data['pencarian']          = $data_payment;
			$this->load->view('Payment/payment', $data);
		} else {
			$data['data_payment']       = $this->M_payment->get_data();
			$data['pencarian']          = null;
			$this->load->view('Payment/payment', $data);
		}

		$this->load->view('layout/footer');
	}

	public function list_rekam_medis()
	{
		$data['data_rekam_medis']   = $this->M_payment->get_data_rekam_medis();

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('payment/list_rekam_medis',$data);
		$this->load->view('layout/footer');
	}

	public function tambah_pembayaran($id_rekam_medis)
	{
		$data['rekam_medis']   			= $this->M_rekamMedis->get_data_rekamMedis($id_rekam_medis);
		$data['data_rekam_medis'] 		= $this->M_rekamMedis->get_data_rekamMedis($id_rekam_medis);
		$data['data_rekam_medis_obat'] 	= $this->M_rekamMedis->get_data_obat($id_rekam_medis);
		$data['data_rekam_medis_tarif'] = $this->M_rekamMedis->get_data_tarif($id_rekam_medis);

		// Mendapatkan data obat dari model M_obat
		$data['data_obat'] = $this->M_obat->get_data();
		// Simpan data obat dalam bentuk array asosiatif ID obat => Nama obat
		$obatArray = array();
		$hargaObat = array();

		foreach ($data['data_obat'] as $obat) {
			$obatArray[$obat->id_data_obat] = $obat->nama_obat;
			$hargaObat[$obat->id_data_obat] = $obat->harga;
		}
		// Kirimkan data obat ke view
		$data['obatArray'] = $obatArray;
		$data['hargaObat'] = $hargaObat;

		// Mendapatkan data tarif dari model M_Tarif
		$data['data_tarif'] = $this->M_tarif->get_data();
		// Simpan data tarif dalam bentuk array asosiatif ID tarif => Nama tarif
		$tarifArray = array();
		$hargaTarif = array();
		foreach ($data['data_tarif'] as $tarif) {
			$tarifArray[$tarif->id_data_tarif] = $tarif->nama_jasa;
			$hargaTarif[$tarif->id_data_tarif] = $tarif->harga;

		}
		// Kirimkan data tarif ke view
		$data['tarifArray'] = $tarifArray;
		$data['hargaTarif'] = $hargaTarif;



		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('payment/add',$data);
		$this->load->view('layout/footer');
	}

	function simpan_pembayaran()
	{
		$id_rekam_medis		= $this->input->post('id_rekam_medis');
		$id_pasien 			= $this->input->post('id_pasien');
		$tanggal_pembayaran	= $this->input->post('tanggal_pembayaran');
		$subtotal			= $this->input->post('subtotal');
		$bayar				= $this->input->post('bayar');
		$kembalian			= $this->input->post('kembalian');

		//ubah status bayar
		$this->M_payment->update_rekam_medis($id_rekam_medis);

		$data = array(
			'id_rekam_medis'	=> $id_rekam_medis,
			'id_pasien' 		=> $id_pasien,
			'tanggal_pembayaran'=> $tanggal_pembayaran,
			'subtotal'			=> $subtotal,
			'bayar'				=> $bayar,
			'kembalian'			=> $kembalian,
			'data_state'		=> 0,
		);
		$this->M_payment->save_payment($data);

		redirect('Payment');
	}

	//get nama pasien
	public function nama_Pasien()
	{
		$idPasien = $this->input->post('id_pasien');
		
		$dataPasien = $this->M_pasien->get_data_pasien($idPasien);

		echo $dataPasien->nama_pasien; // Kirim nama pasien sebagai respons
	}

	//hapus
	function hapus_pembayaran($id_pembayaran)
	{
		$this->M_payment->soft_delete($id_pembayaran);
		redirect('Payment');
	}
	
	// edit
	function ubah_pembayaran($id_pembayaran)
	{
  		$data['data_pembayaran'] 		= $this->M_payment->get_data_pembayaran($id_pembayaran);


		$data['rekam_medis']   			= $this->M_rekamMedis->get_data_rekamMedis($data['data_pembayaran']->id_rekam_medis);
		$data['data_rekam_medis'] 		= $this->M_rekamMedis->get_data_rekamMedis($data['data_pembayaran']->id_rekam_medis);
		$data['data_rekam_medis_obat'] 	= $this->M_rekamMedis->get_data_obat($data['data_pembayaran']->id_rekam_medis);
		$data['data_rekam_medis_tarif'] = $this->M_rekamMedis->get_data_tarif($data['data_pembayaran']->id_rekam_medis);

		// Mendapatkan data obat dari model M_obat
		$data['data_obat'] = $this->M_obat->get_data();
		// Simpan data obat dalam bentuk array asosiatif ID obat => Nama obat
		$obatArray = array();
		$hargaObat = array();

		foreach ($data['data_obat'] as $obat) {
			$obatArray[$obat->id_data_obat] = $obat->nama_obat;
			$hargaObat[$obat->id_data_obat] = $obat->harga;
		}
		// Kirimkan data obat ke view
		$data['obatArray'] = $obatArray;
		$data['hargaObat'] = $hargaObat;

		// Mendapatkan data tarif dari model M_Tarif
		$data['data_tarif'] = $this->M_tarif->get_data();
		// Simpan data tarif dalam bentuk array asosiatif ID tarif => Nama tarif
		$tarifArray = array();
		$hargaTarif = array();
		foreach ($data['data_tarif'] as $tarif) {
			$tarifArray[$tarif->id_data_tarif] = $tarif->nama_jasa;
			$hargaTarif[$tarif->id_data_tarif] = $tarif->harga;

		}
		// Kirimkan data tarif ke view
		$data['tarifArray'] = $tarifArray;
		$data['hargaTarif'] = $hargaTarif;


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('payment/edit',$data);
		$this->load->view('layout/footer');
	}

	function update_rekam_medis()
	{
		$id_pembayaran 		= $this->input->post('id_pembayaran');
		$id_rekam_medis 	= $this->input->post('id_rekam_medis');
		$id_pasien 			= $this->input->post('id_pasien');
		$tanggal_pembayaran	= $this->input->post('tanggal_pembayaran');
		$subtotal			= $this->input->post('subtotal');
		$bayar				= $this->input->post('bayar');
		$kembalian			= $this->input->post('kembalian');

		$data = array(
			'id_pembayaran' 	=> $id_pembayaran,
			'id_rekam_medis' 	=> $id_rekam_medis,
			'id_pasien' 		=> $id_pasien,
			'tanggal_pembayaran'=> $tanggal_pembayaran,
			'subtotal'			=> $subtotal,
			'bayar'				=> $bayar,
			'kembalian'			=> $kembalian,
			'data_state'		=> 0,
		);
		// echo json_encode($data);
		// exit;
		$this->M_payment->save_update($id_pembayaran, $data);
		redirect('Payment');
	}

	function detail_rekam_medis($id_pasien)
	{
		$data['data_pasien'] = $this->M_rekamMedis->get_data_pasien($id_pasien);
		$this->load->view('layout/header');
		$this->load->view('pasien/detail', $data);
		$this->load->view('layout/footer');
	}
}
