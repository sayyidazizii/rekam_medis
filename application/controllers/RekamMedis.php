<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekamMedis');
		$this->load->model('M_tarif');
		$this->load->model('M_obat');
		$this->load->model('M_pasien');

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
		$data['data_pasien'] = $this->M_pasien->get_data();
		$data['data_tarif'] = $this->M_tarif->get_data();
		$data['data_obat'] = $this->M_obat->get_data();

		// Setelah selesai, hapus session jika diperlukan
		$this->session->unset_userdata('data_jasa');
		$this->session->unset_userdata('data_obat');


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('rekam_medis/add',$data);
		$this->load->view('layout/footer');
	}

	public function simpan_rekam_medis()
	{
		$id_pasien 			= $this->input->post('id_pasien');
		$amnesa 			= $this->input->post('amnesa');
		$diagnosa			= $this->input->post('diagnosa');
		$tanggal_periksa	= $this->input->post('tanggal_periksa');
		$tindakan			= $this->input->post('tindakan');

		$data = array(
			'no_rm'				=> $this->numberRm(),
			'id_pasien' 		=> $id_pasien,
			'amnesa'			=> $amnesa,
			'diagnosa'			=> $diagnosa,
			'tanggal_periksa'	=> $tanggal_periksa,
			'tindakan'			=> $tindakan,
			'status_bayar'		=> 0,
			'data_state'		=> 0,
		);
		$this->M_rekamMedis->save($data);
		$id_rekam_medis = $this->db->insert_id();

		 // Ambil data dari session
		 $data_jasa = $this->session->userdata('data_jasa');
		 $data_obat = $this->session->userdata('data_obat');

		 // Simpan data jasa
		foreach ($data_jasa as $jasa) {
			$data_tarif = array(
				'id_rekam_medis' => $id_rekam_medis,
				'id_data_tarif'  => $jasa['id_data_tarif'],
			);

			$this->M_rekamMedis->save_jasa($data_tarif);
		}

		// Simpan data obat
		foreach ($data_obat as $obat) {
			// Menggunakan ID rekam medis dalam data obat sebelum menyimpannya
			$data_obat = array(
				'id_rekam_medis' => $id_rekam_medis,
				'id_data_obat'   => $obat['id_data_obat'],
				'quantity'       => $obat['quantity']
			);

			$this->M_rekamMedis->save_obat($data_obat);

			// Mendapatkan stok obat berdasarkan ID
			$stok_obat = $this->M_obat->get_data_obat($obat['id_data_obat']);

			// Memeriksa apakah stok mencukupi
			if ($stok_obat->stok >= $obat['quantity']) {
				// Mengurangi stok obat
				$new_stok = array(
					'nama_obat' 	=> $stok_obat->nama_obat,
					'kategori'		=> $stok_obat->kategori,
					'stok'			=> $stok_obat->stok - $obat['quantity'],
					'harga' 		=> $stok_obat->harga,
					'keterangan' 	=> $stok_obat->keterangan
				);
				// Memperbarui stok obat di database
				$this->M_obat->save_update_medicine($obat['id_data_obat'], $new_stok);
			} else {
				// Tindakan yang sesuai jika stok tidak mencukupi
			}
		}


		redirect('RekamMedis');
	}

	//get nama pasien
	public function nama_Pasien()
	{
		$idPasien = $this->input->post('id_pasien');
		
		$dataPasien = $this->M_pasien->get_data_pasien($idPasien);

		echo $dataPasien->nama_pasien; // Kirim nama pasien sebagai respons
	}

	//get stock obat
	public function stock_Obat()
	{
		$idObat = $this->input->post('id_data_obat');
		
		$dataObat = $this->M_obat->get_data_obat($idObat);

		echo $dataObat->stok; // Kirim sebagai respons
	}

	//buat session data jasa
	public function simpan_data_jasa()
	{
		$selectedJasa = $this->input->post('selected_jasa');
		$data_jasa = $this->session->userdata('data_jasa') ?? [];
		$data_jasa[] = array(
			'id_data_tarif' => $selectedJasa,
		); 
		$this->session->set_userdata('data_jasa', $data_jasa);
	}
	//buat session data obat
	public function simpan_data_obat()
	{
		$selectedObat 	= $this->input->post('selected_obat');
		$quantity 		= $this->input->post('quantity');

		$data_obat = $this->session->userdata('data_obat') ?? [];
		$data_obat[] = array(
			'id_data_obat' 	=> $selectedObat,
			'quantity'		=> $quantity
		);
		$this->session->set_userdata('data_obat', $data_obat);
	}

	//nomor rekam medis
	public function numberRm()
    {
        $latest = $this->M_rekamMedis->latest();

        if (!$latest) {
            return 'RM0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->no_rm);

        return 'RM' . sprintf('%04d', $string + 1);
    }

	//hapus
	function hapus_rekam_medis($id_rekam_medis)
	{
		$this->M_rekamMedis->delete($id_rekam_medis);
		redirect('RekamMedis');
	}
	
	// edit
	function ubah_rekam_medis($id_rekam_medis)
	{
		$data['data_pasien'] = $this->M_pasien->get_data();
		$data['data_rekam_medis'] = $this->M_rekamMedis->get_data_rekamMedis($id_rekam_medis);
		$data['data_rekam_medis_obat'] = $this->M_rekamMedis->get_data_obat($id_rekam_medis);
		$data['data_rekam_medis_tarif'] = $this->M_rekamMedis->get_data_tarif($id_rekam_medis);

		// Mendapatkan data obat dari model M_obat
		$data['data_obat'] = $this->M_obat->get_data();
		// Simpan data obat dalam bentuk array asosiatif ID obat => Nama obat
		$obatArray = array();
		foreach ($data['data_obat'] as $obat) {
			$obatArray[$obat->id_data_obat] = $obat->nama_obat;
		}
		// Kirimkan data obat ke view
		$data['obatArray'] = $obatArray;

		// Mendapatkan data tarif dari model M_Tarif
		$data['data_tarif'] = $this->M_tarif->get_data();
		// Simpan data tarif dalam bentuk array asosiatif ID tarif => Nama tarif
		$tarifArray = array();
		foreach ($data['data_tarif'] as $tarif) {
			$tarifArray[$tarif->id_data_tarif] = $tarif->nama_jasa;
		}
		// Kirimkan data tarif ke view
		$data['tarifArray'] = $tarifArray;

		// echo json_encode($data);
		// exit;

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('rekam_medis/edit', $data);
		$this->load->view('layout/footer');
	}

	function update_rekam_medis()
	{
		$id_rekam_medis 	= $this->input->post('id_rekam_medis');
		$id_pasien 			= $this->input->post('id_pasien');
		$amnesa 			= $this->input->post('amnesa');
		$diagnosa			= $this->input->post('diagnosa');
		$tanggal_periksa	= $this->input->post('tanggal_periksa');
		$tindakan			= $this->input->post('tindakan');

		$data = array(
			'id_rekam_medis' 	=> $id_rekam_medis,
			'id_pasien' 		=> $id_pasien,
			'amnesa'			=> $amnesa,
			'diagnosa'			=> $diagnosa,
			'tanggal_periksa'	=> $tanggal_periksa,
			'tindakan'			=> $tindakan,
			'data_state'		=> 0,
		);
		// echo json_encode($data);
		// exit;
		$this->M_rekamMedis->save_update($id_rekam_medis, $data);
		redirect('rekamMedis');
	}

	function detail_rekam_medis($id_rekam_medis)
	{
		$data['data_rekam_medis'] = $this->M_rekamMedis->get_data_rekamMedis($id_rekam_medis);
		$data['data_rekam_medis_obat'] = $this->M_rekamMedis->get_data_obat($id_rekam_medis);
		$data['data_rekam_medis_tarif'] = $this->M_rekamMedis->get_data_tarif($id_rekam_medis);

		// Mendapatkan data obat dari model M_obat
		$data['data_obat'] = $this->M_obat->get_data();
		// Simpan data obat dalam bentuk array asosiatif ID obat => Nama obat
		$obatArray = array();
		foreach ($data['data_obat'] as $obat) {
			$obatArray[$obat->id_data_obat] = $obat->nama_obat;
		}
		// Kirimkan data obat ke view
		$data['obatArray'] = $obatArray;

		// Mendapatkan data tarif dari model M_Tarif
		$data['data_tarif'] = $this->M_tarif->get_data();
		// Simpan data tarif dalam bentuk array asosiatif ID tarif => Nama tarif
		$tarifArray = array();
		foreach ($data['data_tarif'] as $tarif) {
			$tarifArray[$tarif->id_data_tarif] = $tarif->nama_jasa;
		}
		// Kirimkan data tarif ke view
		$data['tarifArray'] = $tarifArray;


		$this->load->view('layout/header');
		$this->load->view('rekam_medis/detail', $data);
		$this->load->view('layout/footer');
	}
}
