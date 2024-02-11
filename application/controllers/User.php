<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			if($this->session->userdata('is_login')!= true){
				redirect('Login');
			}
			if($this->session->userdata('level')!= 1){
				redirect('Home');
			}
			$this->load->model('M_user');
	}
	
	public function index()
	{
		$data_user = $this->input->get('data_user');

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		if ($data_user != null) {
			$data['data_user'] = $this->M_user->get_search_data($data_user);
			$data['pencarian'] = $data_user;
			$this->load->view('user/index', $data);
		} else {
			$data['data_user'] = $this->M_user->get_data();
			$data['pencarian'] = null;
			$this->load->view('user/index', $data);
		}

		$this->load->view('layout/footer');

	}


	public function processAdd()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password'); 
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');

		$data = array(
			'username' => $username,
			'password' => md5($password),
			'nama' => $nama,
			'level' => $level
		);
		
		$this->db->insert('user', $data);
        redirect("User");
	}


	public function edit($id_user)
	{
		$data['data_user'] = $this->M_user->getbyid($id_user);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('user/edit', $data);
		$this->load->view('layout/footer');

	}

	public function edit_password($id_user)
	{
		$data['data_user'] = $this->M_user->getbyid($id_user);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('user/edit_password', $data);
		$this->load->view('layout/footer');

	}


	public function processEdit()
	{
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');

		$data = array(
			'username' => $username,
			'nama' => $nama,
			'level' => $level
		);
		

		$this->M_user->update($id_user, $data);
        redirect("User");
	}


	public function processEditPassword()
	{
		$id_user = $this->input->post('id_user');
		$password = $this->input->post('password'); 

		$data = array(
			'password' => md5($password),
		);
		

		$this->M_user->update($id_user, $data);
        redirect("User");
	}

	public function hapus()
	{
		$id_user = $this->input->post('id_user');

		$data = array(
			'data_state' => 1,
		);
		
		$this->M_user->delete($id_user, $data);
        redirect("User");
	}
	

}