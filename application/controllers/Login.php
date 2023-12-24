<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
				$this->load->model('M_user');
        }

	public function index()
	{
		$this->load->view('login');
	}

	public function Auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->M_user->Checkuser($username,$password) == true){
			$row = $this->M_user->getbyusername($username);
			$data_user = array(
					'username'=>$username,
					'password'=>$password,
					'id_level'=>$row->id_level,
					'is_login'=> true
			);
			$this->session->set_userdata($data_user);
			//jika berhasil redirect ke halaman home
			redirect('Home');
			exit;
		}else{
			redirect('Login');
		}
	}
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

}