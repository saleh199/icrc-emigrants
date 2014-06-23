<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "اسم المستخدم", "trim|required");
		$this->form_validation->set_rules("password", "كلمة المرور", "trim|required");


		if($this->form_validation->run() == TRUE){
			$remember = FALSE;
			if($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember)){
				redirect('login/dashboard', 'refresh');
			}else{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh');
			}
		}else{
			$data["message"] = (validation_errors()) ? validation_errors('<li>', '</li>') : $this->ion_auth->errors();

			$data["form_open"] = form_open(site_url("login"), array("id" => "login-form", "class" => "form-signin", "role" => "form"));

			$data["username"] = array(
				"name"	=> "username",
				"id"	=> "username",
				"type"	=> "text",
				"value"	=> $this->form_validation->set_value('username'),
				"class"	=> "form-control",
				"placeholder"	=> "اسم المستخدم",
				"required"	=> TRUE,
				"autofocus"	=> TRUE
			);

			$data["password"] = array(
				"name"	=> "password",
				"id"	=> "password",
				"type"	=> "password",
				"class" => "form-control",
				"placeholder"	=> "كلمة المرور",
				"required"	=> TRUE
			);

			$this->load->view("login", $data);
		}
	}

	public function dashboard(){
		$this->load->view('family/family_form');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */