<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
	}

	public function dashboard()
	{

		$this->load->view("dashboard");
		
	}

	public function logout(){
		$this->ion_auth->logout();

		$this->session->set_flashdata('تم تسجيل الخروج بنجاح');

		redirect('login', 'refresh');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */