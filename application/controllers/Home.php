<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
        $this->load->model('toko_buku');
    }

	public function index()
	{

		$this->load->view('home');
	}

    
}
