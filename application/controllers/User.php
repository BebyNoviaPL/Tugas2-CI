<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class User extends CI_Controller { 

 public function __construct() 
    { 
        parent::__construct(); 
                 
        $this->load->library('form_validation'); 
        $this->load->model('User_model'); 
    } 

 public function index() 
 { 
  $this->load->view('header'); 
  $this->load->view('users/register'); 
  $this->load->view('footer'); 
 } 

 // Register user 
    public function register(){ 
        $data['page_title'] = 'Pendaftaran User'; 

        $this->form_validation->set_rules('nama', 'Nama', 'required'); 
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]'); 
        $this->form_validation->set_rules('email', 'Email','required|is_unique[users.email]'); 
        $this->form_validation->set_rules('password', 'Password', 'required'); 
        $this->form_validation->set_rules('password2', 'Konfirmasi Password','matches[password]'); 

        if($this->form_validation->run() === FALSE){ 
            $this->load->view('header'); 
            $this->load->view('users/register', $data); 
            $this->load->view('footer'); 
        } else { 
            // Encrypt password 
            $enc_password = md5($this->input->post('password')); 

            $this->User_model->register($enc_password); 

            // Tampilkan pesan 
            $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.'); 

            redirect('bslog'); 
        } 
    }

     // Log in user
    public function login(){
        $data['page_title'] = 'Log In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('users/login', $data);
            $this->load->view('footer');
        } else {
        // Get username
        $username = $this->input->post('username');
        // Get & encrypt password
        $password = md5($this->input->post('password'));

        // Login user
        $user_id = $this->User_model->login($username, $password);
       // $level = $this->User_model->getLevel($username, $password);
        if($user_id){
        // Buat session
        $user_data = array(
            'user_id' => $user_id['user_id'],
            'username' => $username,
            'level' => $user_id['level'],
            'logged_in' => true
        );
         $this->session->set_userdata($user_data);

        // Set message
        $this->session->set_flashdata('user_loggedin', 'You are now logged in');
        
        redirect('blog');
        } else {
        // Set message
        $this->session->set_flashdata('login_failed', 'Login is invalid');

        redirect('User/login');
            }       
        }
    }

    // Log user out
    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('User/login');
    }

}