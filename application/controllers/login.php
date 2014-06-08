<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "اسم المستخدم", "trim|required");
		$this->form_validation->set_rules("password", "كلمة المرور", "trim|required");
		$this->form_validation->set_rules("validateLogin", "خطأ", "callback_validateLogin");


		if($this->form_validation->run() == TRUE){

		}

		$this->load->model("employee_model");

		$data["form_open"] = form_open(base_url("login"), array("id" => "login-form", "class" => "form-signin", "role" => "form"));

		$this->load->view("login", $data);
	}


	public function validateLogin()
	{
		$username = $this->input->post("username", TRUE);
		$password = $this->input->post("password", TRUE);

		$this->load->model("employee_model");

		if($this->employee_model->login($username, $password)){
			return TRUE;
		}else{
			$this->form_validation->set_message('validateLogin', 'خطأ في اسم المستخدم / كلمة المرور');
			return FALSE;
		}
	}

	public function dashboard(){
		$this->load->view('dashboard');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */