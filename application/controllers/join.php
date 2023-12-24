<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
        $this->load->model('M_join');
    }

	public function index()
	{
        $data['user'] = $this->M_join->get_user();
        $data['level'] = $this->M_join->get_level();
        $data['join'] = $this->M_join->get_join();
        $this->load->view('join.php',$data);
	}

    
}