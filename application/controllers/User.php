<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			if($this->session->userdata('is_login')!= true){
				redirect('Login');
			}
		  $this->load->model('toko_buku');
	}
	
	public function index()
	{
		$this->load->view('User');
	}

	public function add()
	{
		
	}

	public function processAdd()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');


		$data = array(
			'username' => $username,
			'password' => md5($password),
			'nama' => $nama,
			'level' => '1'
		);
		
		$this->db->insert('user', $data);
        redirect("User");

	}

}