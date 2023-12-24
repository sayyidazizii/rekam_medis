<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('toko_buku');
    }

	public function index()
	{
        $query = $this->toko_buku->get_data();
        $data = array('buku'=>$query);
		$this->load->view('buku_view',$data);
	}

    public function tambah()
    {
        $this->load->view('tambah_view');
    }

    public function simpan()
    {
        $judul = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');

        $Arrinsert = array(
            'judul'=>$judul,
            'pengarang'=>$pengarang
        );
        $this->toko_buku->insert($Arrinsert);
        redirect("Buku");
    }

    public function edit($id)
    {
        $query = $this->toko_buku->getbyid($id);
        $data = array('buku'=>$query);
        $this->load->view('edit_view',$data);
    }

    public function simpan_edit()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');

        $Arrupdate = array(
            "id"=>$id,
            "judul"=>$judul,
            "pengarang"=>$pengarang);

            $this->toko_buku->update($id,$Arrupdate);
            redirect("buku");
    }

    public function hapus($id)
    {
        $this->toko_buku->delete($id);
        redirect("Buku");
    }
}
