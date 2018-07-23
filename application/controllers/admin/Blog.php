<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

   function __construct() {
      parent::__construct();
      //load model Customer_m
      $this->load->model('Blog_model');
      //load helper form 
      $this->load->helper('form','url');  
   }

	public function index() { 
      $data['getAll'] = $this->Blog_model->getAll();
      $this->load->view('admin/blog/blog.php',$data);
   } 
  
   public function tambah() {
      $data['error'] = ""; 
      $this->load->library('form_validation');
      $this->form_validation->set_rules('author', 'Author', 'required');
      $this->form_validation->set_rules('title', 'Title', 'required');
      if ($this->form_validation->run() == FALSE)
      {
         $this->load->view('admin/blog/tambah.php',$data); 
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
            $this->load->view('admin/blog/tambah.php', $error);
         } 

         else {  
            $dataUpload = $this->upload->data();  
            $data = array(   
               'author' => $this->input->post('author'), 
               'date' => $this->input->post('date'), 
               'title' => $this->input->post('title'), 
               'content' => $this->input->post('content'), 
               'image_file' => $dataUpload['file_name']  
               );  
            $this->Blog_model->insert($data); 
            redirect('admin/Blog');  
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
            $this->load->view('header');
            $this->load->view('blog_add_view', $error); 
            $this->load->view('footer');
         }
         
         else { 
            $dataUpload = $this->upload->data(); 
            $data = array( 
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
           $this->load->view('header');
           $this->load->view('blog_view',$data); 
           $this->load->view('footer');
  	}

   public function update($id) {
      $data['error'] = ""; 
      $this->load->library('form_validation');
      $this->form_validation->set_rules('author', 'Author', 'required');
      $this->form_validation->set_rules('title', 'Title', 'required');
      $data['records'] = $this->Blog_model->getOne($id);
      if ($this->form_validation->run() == FALSE)
      {
         $this->load->view('admin/blog/ubah.php',$data); 
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
            $this->load->view('admin/blog/ubah.php', $data);  
         } 

         else {  
            $dataUpload = $this->upload->data();  
            $data = array(   
               'author' => $this->input->post('author'), 
               'date' => $this->input->post('date'), 
               'title' => $this->input->post('title'), 
               'content' => $this->input->post('content'), 
               'image_file' => $dataUpload['file_name']  
               );  
            $this->Blog_model->update($data,$id); 
            redirect('admin/Blog');  
         } 
      }  
   }

   public function delete($id){
      $this->Blog_model->delete($id);
      redirect('admin/Blog');
   }

}