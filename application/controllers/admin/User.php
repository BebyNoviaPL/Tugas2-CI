<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
      parent::__construct();
      //load model User_model
      $this->load->model('User_model');
      //load helper form 
      $this->load->helper('form','url');  
   }

	public function index()
	{
		$data['getData'] = $this->User_model->getData();
		$this->load->view('admin/user/user.php',$data);
	}

	public function tambah()
	{
		$data['message'] = "";
		$data['level'] = $this->db->get('level')->result();
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('nama','Name','required|alpha');
		$this->form_validation->set_rules('kodepos','Kode Pos','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password','matches[password]');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'users/tambah.php'
			$this->load->view('admin/user/tambah.php',$data); 
		}
		// jika kita sudah melalukan submit
		else{
			// Encrypt password
            $enc_password = md5($this->input->post('password'));
            $set = $this->input->post();
            unset($set['password2']);
            $set['fk_level_id'] = 2;
            $set['password'] = $enc_password;
            $this->User_model->tambah($set);
            redirect('admin/User','refresh');
		}
	}

	public function update($id)
	{
		$data['message'] = "";
		$data['level'] = $this->db->get('level')->result();
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('nama','Name','required');
		$this->form_validation->set_rules('kodepos','Kode Pos','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','password','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		

		//memberikan data berisi data yang sesuai dengan $id
		$data['update'] = $this->db->where('user_id',$id)->get("users")->result_array()[0];

		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'users/ubah.php'
			$this->load->view('admin/user/update',$data);
		}
		// jika kita sudah melalukan submit
		else{
			$this->User_model->update($id);
			redirect('admin/User','refresh');
		}
	}

	public function delete($id)
	{
		$this->User_model->delete($id);
      	redirect('admin/User');
	}


}