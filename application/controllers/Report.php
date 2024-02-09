<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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

	public function print_payment()
	{
		$start_date = $this->input->get('start_date');
		$end_date 	= $this->input->get('end_date');

		if ($start_date != null) {
			$data['data_payment'] 	= $this->M_payment->report($start_date,$end_date);
			$data['start_date'] 	= $start_date;
			$data['end_date'] 		= $end_date;

			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->filename = "Laporan-Pembayaran.pdf";
			$this->pdf->load_view('Laporan/Payment/pdf_view', $data);
		} else {
			$data['data_payment'] 	= $this->M_payment->get_data();
			$data['start_date'] 	= null;
			$data['end_date'] 		= null;

			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->filename = "Laporan-Pembayaran.pdf";
			$this->pdf->load_view('Laporan/Payment/pdf_view', $data);
		}

	}

	public function print_rekam_medis()
	{
		$start_date = $this->input->get('start_date');
		$end_date 	= $this->input->get('end_date');

		if ($start_date != null) {
			$data['data_rekam_medis'] 	= $this->M_rekamMedis->report($start_date,$end_date);
			$data['start_date'] 	= $start_date;
			$data['end_date'] 		= $end_date;

			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->filename = "Laporan Rekam Medis.pdf";
			$this->pdf->load_view('Laporan/Rekam_Medis/pdf_view', $data);
		} else {
			$data['data_rekam_medis'] 	= $this->M_rekamMedis->get_data();
			$data['start_date'] 	= null;
			$data['end_date'] 		= null;

			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->filename = "Laporan Rekam Medis.pdf";
			$this->pdf->load_view('Laporan/Rekam_Medis/pdf_view', $data);
		}

	}

	//export excel rekam medis
	public function export_rekam_medis(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
		  'font' => ['bold' => true], // Set font nya jadi bold
		  'alignment' => [
			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ],
		  'borders' => [
			'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
		  ]
		];
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
		  'alignment' => [
			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ],
		  'borders' => [
			'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
		  ]
		];
		$sheet->setCellValue('A1', "LAPORAN DATA REKAM MEDIS"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('B3', "NO RM"); // Set kolom B3 dengan tulisan "NIS"
		$sheet->setCellValue('C3', "NO KARTU"); // Set kolom C3 dengan tulisan "NAMA"
		$sheet->setCellValue('D3', "NAMA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$sheet->setCellValue('E3', "AMNESA"); 
		$sheet->setCellValue('F3', "DIAGNOSA"); 
		$sheet->setCellValue('G3', "TANGGAL"); 
		$sheet->setCellValue('H3', "TINDAKAN"); 
		$sheet->setCellValue('I3', "STATUS"); 
		
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A3')->applyFromArray($style_col);
		$sheet->getStyle('B3')->applyFromArray($style_col);
		$sheet->getStyle('C3')->applyFromArray($style_col);
		$sheet->getStyle('D3')->applyFromArray($style_col);
		$sheet->getStyle('E3')->applyFromArray($style_col);
		$sheet->getStyle('F3')->applyFromArray($style_col);
		$sheet->getStyle('G3')->applyFromArray($style_col);
		$sheet->getStyle('H3')->applyFromArray($style_col);
		$sheet->getStyle('I3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$start_date = $this->input->get('start_date');
		$end_date 	= $this->input->get('end_date');

		if ($start_date != null) {
			$data['data_rekam_medis'] 	= $this->M_rekamMedis->report($start_date,$end_date);
			$data['start_date'] 	= $start_date;
			$data['end_date'] 		= $end_date;
		} else {
			$data['data_rekam_medis'] 	= $this->M_rekamMedis->get_data();
			$data['start_date'] 	= null;
			$data['end_date'] 		= null;
		}
		// var_dump($data['data_rekam_medis']);
		// exit;

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($data['data_rekam_medis'] as $data){ // Lakukan looping pada variabel siswa
		  $sheet->setCellValue('A'.$numrow, $no);  
		  $sheet->setCellValue('B'.$numrow, $data->no_rm);
		  $sheet->setCellValue('C'.$numrow, $data->no_kartu);
		  $sheet->setCellValue('D'.$numrow, $data->nama_pasien);
		  $sheet->setCellValue('E'.$numrow, $data->amnesa);
		  $sheet->setCellValue('F'.$numrow, $data->diagnosa);
		  $sheet->setCellValue('G'.$numrow, $data->tanggal_periksa);
		  $sheet->setCellValue('H'.$numrow, $data->tindakan);
		if($data->status_bayar == 1){
			$sheet->setCellValue('I'.$numrow, 'dibayar');
		}else{
			$sheet->setCellValue('I'.$numrow, 'dibayar');

		}
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);

		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$sheet->getColumnDimension('A')->setWidth(5); 
		$sheet->getColumnDimension('B')->setWidth(15); 
		$sheet->getColumnDimension('C')->setWidth(25); 
		$sheet->getColumnDimension('D')->setWidth(20); 
		$sheet->getColumnDimension('E')->setWidth(30); 
		$sheet->getColumnDimension('F')->setWidth(30); 
		$sheet->getColumnDimension('G')->setWidth(30); 
		$sheet->getColumnDimension('H')->setWidth(30);
		$sheet->getColumnDimension('I')->setWidth(30); 

		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$sheet->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$sheet->setTitle("Laporan Rekam Medis");
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Rekam-Medis.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}	

	//export excel pembayaran
	public function export_payment(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
		  'font' => ['bold' => true], // Set font nya jadi bold
		  'alignment' => [
			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ],
		  'borders' => [
			'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
		  ]
		];
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
		  'alignment' => [
			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ],
		  'borders' => [
			'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
		  ]
		];
		$sheet->setCellValue('A1', "LAPORAN DATA PEMBAYARAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('B3', "NAMA PASIEN");
		$sheet->setCellValue('C3', "NO KARTU"); 
		$sheet->setCellValue('D3', "TANGGAL PEMBAYARAN"); 
		$sheet->setCellValue('E3', "SUBTOTAL"); 
		$sheet->setCellValue('F3', "BAYAR"); 
		$sheet->setCellValue('G3', "KEMBALIAN"); 
		
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A3')->applyFromArray($style_col);
		$sheet->getStyle('B3')->applyFromArray($style_col);
		$sheet->getStyle('C3')->applyFromArray($style_col);
		$sheet->getStyle('D3')->applyFromArray($style_col);
		$sheet->getStyle('E3')->applyFromArray($style_col);
		$sheet->getStyle('F3')->applyFromArray($style_col);
		$sheet->getStyle('G3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$start_date = $this->input->get('start_date');
		$end_date 	= $this->input->get('end_date');

		if ($start_date != null) {
			$data['data_payment'] 	= $this->M_payment->report($start_date,$end_date);
			$data['start_date'] 	= $start_date;
			$data['end_date'] 		= $end_date;
		} else {
			$data['data_payment'] 	= $this->M_payment->get_data();
			$data['start_date'] 	= null;
			$data['end_date'] 		= null;
		}
		// echo json_encode($data['data_payment']);
		// exit;

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($data['data_payment']  as $data){ // Lakukan looping pada variabel siswa
		  $sheet->setCellValue('A'.$numrow, $no);  
		  $sheet->setCellValue('B'.$numrow, $data->nama_pasien);
		  $sheet->setCellValue('C'.$numrow, $data->no_kartu);
		  $sheet->setCellValue('D'.$numrow, $data->tanggal_pembayaran);
		  $sheet->setCellValue('E'.$numrow, $data->subtotal);
		  $sheet->setCellValue('F'.$numrow, $data->bayar);
		  $sheet->setCellValue('G'.$numrow, $data->kembalian);

		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);

		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom F
		$sheet->getColumnDimension('G')->setWidth(30); // Set width kolom G

		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$sheet->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$sheet->setTitle("Laporan Pembayaran");
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Pembayaran.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}	
}
