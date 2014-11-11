<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribution extends CI_Controller {

	public function materials_list(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$json = array();

		$this->load->model("material_model");

		$donor_id = $this->input->get("donor_id");
		$donor_id = intval($donor_id);

		$json['materials'] = $this->material_model->dropdown($donor_id, 'المادة الموزعة');

		header("Content-Type: text/json");
		print json_encode($json);
	}

	public function insert(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$json = [];

		$this->load->model('form_distribution_model', 'form_distribution');

		if($this->form_distribution->validateData()){
			$data = array(
				"form_details_id" => intval($this->input->post('form_details_id')),
				"material_id" => intval($this->input->post('material_id')),
				"quantity" => intval($this->input->post('quantity')),
				"date_distribution" => strtotime($this->input->post('date_distribution')),
			);

			if($this->form_distribution->insert($data)){
				$json['result'] = 'success';
			}else{
				$json['result'] = 'fail';
			}
		}else{
			$json['result'] = 'success';
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}
}

/* End of file distribution.php */
/* Location: ./application/controllers/distribution.php */