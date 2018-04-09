<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

 public function index() { 
         
         $data['records'] = $this->Blog_model->getAll(); 
         $this->load->view('blog_list',$data); 
      } 
  
     public function add_view() {
         $this->load->view('blog_add_view'); 
      }
    
      public function add_action() { 
         $data = array( 
            'id' => $this->input->post('id'),
            'author' => $this->input->post('author'),
            'date' => $this->input->post('date'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'image_file' => $this->input->post('image_file') 
         ); 
         $this->Blog_model->insert($data); 
         redirect("index.php/Blog");
      }

      public function byId($id){
     $data['records'] = $this->Blog_model->getOne($id); 
         $this->load->view('blog_view',$data); 
   }
}