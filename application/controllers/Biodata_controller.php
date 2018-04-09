<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_controller extends CI_Controller {

	
	public function index()
	{
		$data['biodata_query_array'] = $this->biodata_model->getQueryArray();
		$data['biodata_query_object'] = $this->biodata_model->getQueryObject();
		$data['biodata_builder_array'] = $this->biodata_model->getBuilderArray();
		$data['biodata_builder_object'] = $this->biodata_model->getBuilderObject();
		
		$this->load->view('biodata',$data); // dengan pasing data ok
	}
}
