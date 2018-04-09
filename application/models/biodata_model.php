<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model {

	
	public function getQueryArray()
	{
		$query = $this->db->query("select * from  biodata");
		return $query->result_array();
	}

	public function getQueryObject()
	{
		$query = $this->db->query("select * from  biodata");
		return $query->result();
	}

	public function getBuilderArray()
	{
		$query = $this->db->get("biodata");
		return $query->result_array();
	}

	public function getBuilderObject()
	{
		$query = $this->db->get("biodata");
		return $query->result();
	}
}
