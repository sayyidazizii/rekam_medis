<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
			$this->load->model('M_pasien');
			if ($this->session->userdata('is_login') == true){
				redirect('Home');
			}
    }

}