<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	
		public function getAll(){
 		 $query = $this->db->get('blog');
  		return $query->result_array();
 		}

 		public function insert($data) { 
         if ($this->db->insert("blog", $data)) { 
            return true; 
         } 
   	 }
   		 public function delete($id) { 
         if ($this->db->delete("blog", "id = ".$id)) { 
            return true; 
         } 
      } 
   
    	 public function update($data,$old_id) { 
         $this->db->set($data); 
         $this->db->where("id", $old_id); 
         $this->db->update("blog", $data); 
      }

      public function getOne($id){
      $query = $this->db->query("select * from blog where id='$id'");
   	return $query->result_array();
     }
     public function get_all_artikel($limit = FALSE, $offset = FALSE) 
    { 
        if($limit){ 
            $this->db->limit($limit,$offset); 
        } 
        $this->db->order_by('blog.date','desc'); 
        $query = $this->db->get('blog'); 
        return $query->result_array(); 
    } 
    public function get_total() 
    { 
        return $this->db->count_all('blog'); 
    }
}
