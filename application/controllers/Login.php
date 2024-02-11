<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
				$this->load->model('M_user');
        }

	public function index()
	{
		if ($this->session->userdata('is_login') == true){
			$level = $this->session->userdata('level');

			if ($level == 1){
				redirect('Home');
			} else if ($level == 2){
				redirect('Home');
			} else {
				redirect('Home');
			}
		}

		$this->load->view('layout/header');
		$this->load->view('auth/login');
		$this->load->view('layout/footer');
	}

	public function Auth()
	{
		$username = $this->input->post('username');
		$password = md5( $this->input->post('password' ));

		$cek_login = $this->M_user->check_user($username, $password);

		if ($cek_login->num_rows() > 0) {
			$user = $cek_login->row();

			$data_user = array(
				'id_user' 	=> $user->id_user,
				'nama'		=> $user->nama,
				'level'		=> $user->level,
				'is_login'	=> true
			);

			$this->session->set_userdata($data_user);
			redirect('login');
		} else {
			$this->session->set_flashdata(array('error_login' => true));
			redirect('login');
		}
	}
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}