<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address extends CI_Controller {

	public function addressFrom(){
		$this->load->model('Form_address_model', 'family_address');
		$this->load->model("property_model");
		$this->load->model("city_model");

		// Address modal
		$hidden = array("form_details_id" => intval($this->input->get_post("form_details_id")));

		if($this->input->get("form_address_id")){
			$formAction = site_url("address/update");
			$hidden["form_address_id"] = intval($this->input->get_post("form_address_id"));
			$addressData = $this->family_address->as_array()->get($hidden["form_address_id"]);
		}else{
			$formAction = site_url("address/insert");
		}

		$data["addressAction"] = form_open($formAction, array("id" => "addressfrm", "role" => "form"), $hidden);
		
		$cities = $this->city_model->dropdown();
		$data["address_city_dropdown"] = form_dropdown("city_id", $cities, (isset($addressData['city_id'])) ? $addressData['city_id'] : '', 'class="form-control" id="city_id"');

		$data["zone"] = form_input(array(
			"type" => "text", 
			"name" => "zone", 
			"class" => "form-control", 
			"placeholder" => "المنطقة", 
			"id" => "zone",
			"value" => (isset($addressData['zone'])) ? $addressData['zone'] : ''
		));

		$data["address"] = form_textarea(array(
			"name" => "address", 
			"class" => "form-control", 
			"placeholder" => "العنوان التفصيلي", 
			"rows" => 3, 
			"id" => "address",
			"value" => (isset($addressData['address'])) ? $addressData['address'] : ''
		));

		$housing_desc = $this->property_model->dropdown('housing_desc', "توصيف السكن");
		$data["housing_desc_dropdown"] = form_dropdown("housing_desc", $housing_desc, (isset($addressData['housing_desc'])) ? $addressData['housing_desc'] : '', 'class="form-control" id="housing_desc"');

		$proof_of_residence = $this->property_model->dropdown('proof_of_residence', "ثبوتيات السكن");
		$data["proof_of_residence_dropdown"] = form_dropdown("proof_of_residence", $proof_of_residence, (isset($addressData['proof_of_residence'])) ? $addressData['proof_of_residence'] : '', 'class="form-control" id="proof_of_residence"');

		$data["host_name"] = form_input(array(
			"type" => "text", 
			"name" => "host_name", 
			"class" => "form-control", 
			"placeholder" => "اسم المضيف", 
			"id" => "host_name",
			"value" => (isset($addressData['host_name'])) ? $addressData['host_name'] : ''
		));

		$data["host_phone"] = form_input(array(
			"type" => "text", 
			"name" => "host_phone", 
			"class" => "form-control", 
			"placeholder" => "هاتف المضيف", 
			"dir" => "ltr", 
			"id" => "host_phone",
			"value" => (isset($addressData['host_phone'])) ? $addressData['host_phone'] : ''
		));

		$data["host_mobile"] = form_input(array(
			"type" => "text", 
			"name" => "host_mobile", 
			"class" => "form-control", 
			"placeholder" => "موبايل المضيف", 
			"dir" => "ltr", 
			"id" => "host_mobile",
			"value" => (isset($addressData['host_mobile'])) ? $addressData['host_mobile'] : ''
		));

		$this->load->view("address/form", $data);
	}

	public function address_list(){
		$this->load->model('Form_address_model', 'family_address');

		$data["results"] = $this->family_address->get_many_by("form_details_id", intval($this->input->get_post("form_details_id")));

		$this->load->view("address/list", $data);	
	}

	public function insert(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$this->load->model('Form_address_model', 'family_address');

		$json = array();
		$result = $this->family_address->validateData();

		if($result["success"]){
			$data = $this->input->post(NULL, TRUE);
			if($this->family_address->insert($data)){
				$json['result'] = 'success';
			}else{
				$json["errors"] = "<li>هناك خطأ أثناء الإدخال الراجء المحاولة مرة أخرى</li>";
			}
		}else{
			$json["errors"] = $result["errors"];
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}

	public function update(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$this->load->model('Form_address_model', 'family_address');

		$json = array();
		$result = $this->family_address->validateData(TRUE);

		if($result["success"]){
			$data = $this->input->post(NULL, TRUE);
			$form_address_id = $data["form_address_id"];

			if($this->family_address->update($form_address_id, $data)){
				$json['result'] = 'success';
			}else{
				$json["errors"] = "<li>هناك خطأ أثناء الإدخال الراجء المحاولة مرة أخرى</li>";
			}
		}else{
			$json["errors"] = $result["errors"];
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}
}

/* End of file address.php */
/* Location: ./application/controllers/address.php */