<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

 public function index() { 
         
         $data['records'] = $this->Blog_model->getAll(); 
         $this->load->view('blog_list',$data); 
      } 
  
     public function add_view() {
        $data['error'] = ""; 
  $this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
  $this->form_validation->set_rules('id', 'Id', 'required');
  $this->form_validation->set_rules('author', 'Author', 'required');
  $this->form_validation->set_rules('title', 'Title', 'required');
  if ($this->form_validation->run() == FALSE)
  {
   $this->load->view('blog_add_view',$data); 
  }
  else
  {
   $config['upload_path']   = './uploads/';  
   $config['allowed_types'] = 'gif|jpg|png';  
   $config['max_size']      = 80000;  
   $config['max_width']     = 1024;  
   $config['max_height']    = 768;   
   $this->load->library('upload', $config); 
   $this->upload->initialize($config); 

   if ( ! $this->upload->do_upload('image_file')) { 
    $error = array('error' => $this->upload->display_errors());  
    $this->load->view('blog_add_view', $error);  
   } 

   else {  
    $dataUpload = $this->upload->data();  
    $data = array(  
     'id' => $this->input->post('id'), 
     'author' => $this->input->post('author'), 
     'date' => $this->input->post('date'), 
     'title' => $this->input->post('title'), 
     'content' => $this->input->post('content'), 
     'image_file' => $dataUpload['file_name']  
     );  
    $this->Blog_model->insert($data); 
    redirect('Blog');  
   } 
  }
      }
    
      public function add_action() { 
       $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 80000; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
         
         if ( ! $this->upload->do_upload('image_file')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('blog_add_view', $error); 
         }
         
         else { 
            $dataUpload = $this->upload->data(); 
            $data = array( 
                  'id' => $this->input->post('id'),
                  'author' => $this->input->post('author'),
                  'date' => $this->input->post('date'),
                  'title' => $this->input->post('title'),
                  'content' => $this->input->post('content'),
                  'image_file' => $dataUpload['file_name'] 
               ); 
               $this->Blog_model->insert($data);
            redirect('Blog'); 
         }

      }

      public function byId($id){
     $data['records'] = $this->Blog_model->getOne($id); 
         $this->load->view('blog_view',$data); 
   }
   public function update_view($id) {
  $data['error'] = ""; 
  $this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
  $this->form_validation->set_rules('id', 'Id', 'required');
  $this->form_validation->set_rules('author', 'Author', 'required');
  $this->form_validation->set_rules('title', 'Title', 'required');
  $data['records'] = $this->Blog_model->getOne($id);
  if ($this->form_validation->run() == FALSE)
  {
   $this->load->view('blog_update_view',$data); 
  }
  else
  {
   $config['upload_path']   = './uploads/';  
   $config['allowed_types'] = 'gif|jpg|png';  
   $config['max_size']      = 80000;  
   $config['max_width']     = 1024;  
   $config['max_height']    = 768;   
   $this->load->library('upload', $config); 
   $this->upload->initialize($config); 

   if ( ! $this->upload->do_upload('image_file')) { 
    $data['error'] = $this->upload->display_errors();  
    $this->load->view('blog_update_view', $data);  
   }

   else {  
    $dataUpload = $this->upload->data();  
    $data = array(  
     'id' => $this->input->post('id'), 
     'author' => $this->input->post('author'), 
     'date' => $this->input->post('date'), 
     'title' => $this->input->post('title'), 
     'content' => $this->input->post('content'), 
     'image_file' => $dataUpload['file_name']  
     );  
    $old_id = $this->input->post('old_id');
    $this->Blog_model->update($data,$old_id); 
    redirect('Blog');  
   } 
  }  
 }
 public function delete_action($id){
  $this->Blog_model->delete($id);
  redirect('Blog');
 }
}