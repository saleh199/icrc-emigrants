<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

	public function dashboard()
	{

		$this->load->view("dashboard");
		
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */