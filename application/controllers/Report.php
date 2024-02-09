<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Report extends CI_Controller
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
 			$data['pencarian']          = $data_payment;
			$this->load->view('Laporan/laporan', $data);
		} else {
			$data['data_payment']       = $this->M_payment->get_data();
			$data['pencarian']          = null;
			$this->load->view('Laporan/laporan', $data);
		}

		$this->load->view('layout/footer');
	}


	public function rekam_medis_report()
	{
		$start_date = $this->input->get('start_date');
		$end_date 	= $this->input->get('end_date');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		
		if ($start_date != null) {
			$data['data_rekam_medis'] 			= $this->M_rekamMedis->report($start_date,$end_date);
			$data['start_date'] 	= $start_date;
			$data['end_date'] 		= $end_date;

			$this->load->view('Laporan/Rekam_Medis/laporan_rekam_medis', $data);
		} else {
			$data['data_rekam_medis'] 	= $this->M_rekamMedis->get_data();
			$data['start_date'] 	= null;
			$data['end_date'] 		= null;

			$this->load->view('Laporan/Rekam_Medis/laporan_rekam_medis', $data);
		}

		$this->load->view('layout/footer');
	}

	public function payment_report(){
		$start_date = $this->input->get('start_date');
		$end_date 	= $this->input->get('end_date');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		
		if ($start_date != null) {
			$data['data_payment'] 			= $this->M_payment->report($start_date,$end_date);
			$data['start_date'] 	= $start_date;
			$data['end_date'] 		= $end_date;

			$this->load->view('Laporan/Payment/laporan_pembayaran', $data);
		} else {
			$data['data_payment'] 	= $this->M_payment->get_data();
			$data['start_date'] 	= null;
			$data['end_date'] 		= null;

			$this->load->view('Laporan/Payment/laporan_pembayaran', $data);
		}

		$this->load->view('layout/footer');
	}

	
}
