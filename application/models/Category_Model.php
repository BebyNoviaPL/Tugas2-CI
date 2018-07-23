<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('cat_name');

        $query = $this->db->get('category');
        return $query->result();
    }

    public function tambah()
    {
        $data = $this->input->post();
        if ($this->db->insert("category", $data)) { 
            return true; 
         } 
    }

    public function getData()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function update($data,$id)
    {
        $this->db->set($data); 
        $this->db->where("cat_id", $id); 
        $this->db->update("category", $data); 
    }

    public function delete($id)
    {
        $this->db->where('cat_id',$id);
        $this->db->delete('category');
    }
}