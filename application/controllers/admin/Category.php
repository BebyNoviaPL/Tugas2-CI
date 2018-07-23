<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller{
  public function __construct()
  {
    parent::__construct();

    // Load custom helper applications/helpers/MY_helper.php

    // Load semua model yang kita pakai
    $this->load->model('Blog_model');
    $this->load->model('Category_model');
  }

  public function index()
  {
   $data['getData'] = $this->Category_model->getData();
   $this->load->view('admin/category/category.php',$data);
  }

  public function tambah() 
  {
    // Judul Halaman
    $data['page_title'] = 'Buat Kategori Baru';

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
      $this->load->view('admin/category/tambah', $data);
    } else {
      $this->Category_model->tambah();
      redirect('admin/category');
    }
  }

  public function update($id)
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    // Form validasi untuk Nama Kategori
    $this->form_validation->set_rules(
      'cat_name',
      'Nama Kategori',
      'required|is_unique[category.cat_name]',
      array(
        'required' => 'Isi %s donk, males amat.',
        'is_unique' => 'Judul <strong>' . $this->input->post('cat_name') . '</strong> sudah ada bosque.'
      )
    );
    $data['update'] = $this->Category_model->getData($id)[0];
    if($this->form_validation->run() === FALSE){
  $this->load->view('templates/header'); 

      $this->load->view('admin/category/update', $data);
    $this->load->view('templates/footer');

    } 
    else {
      $set = $this->input->post();
     $this->Category_model->update($set,$id);
     redirect('admin/Category');
    }
  }

  public function delete($id)
  {
    $this->Category_model->delete($id);
    redirect('admin/Category');
  }
}