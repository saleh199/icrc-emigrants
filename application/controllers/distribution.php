<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribution extends CI_Controller {

	public function materials_list(){
		/*if(!$this->input->is_ajax_request()){
			show_404();
		}*/

		$json = array();

		$this->load->model("material_model");

		$donor_id = $this->input->get("donor_id");
		$donor_id = intval($donor_id);

		$json['materials'] = $this->material_model->dropdown($donor_id);

		header("Content-Type: text/json");
		print json_encode($json);
	}
}

/* End of file distribution.php */
/* Location: ./application/controllers/distribution.php */