<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
				$this->load->model('M_user');
				if ($this->session->userdata('is_login') == true){
					redirect('Home');
				}
        }

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('auth/login');
		$this->load->view('layout/footer');
	}

	

	public function Auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// var_dump($username,$password);

		if($this->M_user->Checkuser($username,$password) == true){
			$row = $this->M_user->getbyusername($username);
			$data_user = array(
					'username'		=> $username,
					'password'		=> $password,
					'level'			=> $row->level,
					'is_login'		=> true
			);
			// true;
			// var_dump($data_user);
			$this->session->set_userdata($data_user);
			//jika berhasil redirect ke halaman home
			redirect('Home');
			exit;
		}else{
			// false;
			redirect('Login');
		}
	}
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

}