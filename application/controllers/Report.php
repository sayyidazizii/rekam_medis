<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
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

	public function rekam_medis_report(){
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		$this->load->view('Laporan/Rekam_Medis/laporan_rekam_medis');

		$this->load->view('layout/footer');
	}

	public function payment_report(){
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		$this->load->view('Laporan/Payment/laporan_pembayaran');
	
		$this->load->view('layout/footer');
	}

	public function print_rekam_medis() {
        // Load Dompdf library
        require_once APPPATH.'libraries/dompdf/autoload.inc.php';
        $dompdf = new Dompdf();
        
        // Load HTML content
        $data['content'] = '<h1>Hello, World!</h1>';
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($this->load->view('Laporan/Rekam_Medis/pdf_view', $data, true));
        
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF content
        $pdf_content = $dompdf->output();
        
        // Load the PDF content into a view for preview
        $data['pdf_content'] = $pdf_content;
        $this->load->view('Laporan/Rekam_Medis/pdf_preview', $data);
    }

	public function print_payment() {
        // Load Dompdf library
        require_once APPPATH.'libraries/dompdf/autoload.inc.php';
        $dompdf = new Dompdf();
        
        // Load HTML content
        $data['content'] = '<h1>Hello, World!</h1>';
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($this->load->view('Laporan/Payment/pdf_view', $data, true));
        
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF content
        $pdf_content = $dompdf->output();
        
        // Load the PDF content into a view for preview
        $data['pdf_content'] = $pdf_content;
        $this->load->view('Laporan/Payment/pdf_preview', $data);
    }

}
