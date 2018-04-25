<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {
public function __construct()
    {
        parent::__construct();

        // Load custom helper applications/helpers/MY_helper.php
        //$this->load->helper('MY');

        // Load semua model yang kita pakai
        $this->load->model('Blog_model');
        $this->load->model('Category_Model');
    }

public function create() 
    {
        // Judul Halaman
        $data['page_title'] = 'Buat Kategori Baru';

        // Kita butuh helper dan library berikut
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Form validasi untuk Nama Kategori
        $this->form_validation->set_rules(
            'cat_name',
            'Nama Kategori',
            'required|is_unique[categories.cat_name]',
            array(
                'required' => 'Isi %s donk, males amat.',
                'is_unique' => 'Judul <strong>' . $this->input->post('cat_name') . '</strong> sudah ada bosque.'
            )
        );

        if($this->form_validation->run() === FALSE){
            
            $this->load->view('cat_create', $data);
           
        } else {
            $this->Category_Model->create_category();
            redirect('category');
        }
    }
}