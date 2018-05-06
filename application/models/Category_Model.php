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

    public function create_category()
    {
        $data = array(
            'cat_name'          => $this->input->post('cat_name'),
            'cat_description'   => $this->input->post('cat_description')
        );

        return $this->db->insert('category', $data);
    }

    public function read_category($id=null)
    {
        if($id != null)
            $this->db->where('cat_id',$id);
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function update_category($id)
    {
        $data = array(
            'cat_name'          => $this->input->post('cat_name'),
            'cat_description'   => $this->input->post('cat_description')
        );

        $this->db->where('cat_id',$id);
        $this->db->update('category',$data);
    }

    public function delete_category($id)
    {
        $this->db->where('cat_id',$id);
        $this->db->delete('category');
    }
}