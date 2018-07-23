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
  $this->load->view('templates/header'); 
  $this->load->view('users/register'); 
  $this->load->view('templates/footer'); 
 } 

 public function register(){ 
    $data['page_title'] = 'Pendaftaran User'; 

    $this->form_validation->set_rules('nama', 'Nama', 'required'); 
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]'); 
    $this->form_validation->set_rules('email', 'Email','required|is_unique[users.email]'); 
    $this->form_validation->set_rules('password', 'Password', 'equired'); 
    $this->form_validation->set_rules('password2', 'Konfirmasi Password','matches[password]'); 

    if($this->form_validation->run() === FALSE){ 
        $this->load->view('header'); 
        $this->load->view('users/register', $data); 
        $this->load->view('footer'); 
    } else { 
            // Encrypt password
             $enc_password = md5($this->input->post('password')); 
             $this->User_model->register($enc_password); 

            // Set message
             $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.'); 
 redirect('Blog'); 
        
        } 
    }

     // Log in user
    public function login(){
        $data['page_title'] = 'Log In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
        // Get username
        $username = $this->input->post('username');
        // Get & encrypt password
        $password = md5($this->input->post('password'));

        // Login user
        $user_id = $this->User_model->login($username, $password);
       //$level = $this->User_model->get_user_level($username, $password);
        if($user_id){
        // Buat session
        $user_data = array(
            'user_id' => $user_id['user_id'],
            'username' => $username,
            'logged_in' => true,
            'level' => $user_id['level']
        );
         $this->session->set_userdata($user_data);

        // Set message
        $this->session->set_flashdata('user_loggedin', 'You are now logged in');
        
        redirect('user/dashboard');
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

        redirect('user/login');
    }

    // Fungsi Dashboard
    function dashboard()
    {
        // Must login
        if(!$this->session->userdata('logged_in')) 
            redirect('User/login');

        $user_id = $this->session->userdata('user_id');

        // Dapatkan detail dari User
        $data['user'] = $this->User_model->get_user_details( $user_id );

        // Load view
        $this->load->view('templates/header', $data);
        $this->load->view('users/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
    public function user()
     {
    $data['records'] = $this->db->get('users')->result_array(); 
    $this->load->view('users/user',$data); 
    }
    public function update($id)
    {
    $data['user'] = $this->db->where('user_id',$id)->get('users')->row(0);
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nama', 'Nama', 'required'); 
    $this->form_validation->set_rules('username', 'Username', 'required'); 
    $this->form_validation->set_rules('email', 'Email','required'); 
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == false) {
        $this->load->view('header'); 
        $this->load->view('users/update',$data); 
        $this->load->view('footer'); 
    }else{
        $this->User_model->update($id);
        redirect('User/user');
     }

}
public function delete_action($id)
{
    $this->User_model->delete($id);
    redirect('User/user');
}
}