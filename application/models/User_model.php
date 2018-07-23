<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	 public function register($enc_password){
       // Array data user
    if($this->input->post('level') == null){
          $level = '2';
        }else{
          $level = $this->input->post('level');
        }
       $data = array(
           'nama' => $this->input->post('nama'),
           'email' => $this->input->post('email'),
           'username' => $this->input->post('username'),
           'password' => $enc_password,
           'kodepos' => $this->input->post('kodepos'),
          'fk_level_id' => $this->input->post('membership')
       );

       // Insert user
       $this->db->insert('users',$data);
       return false;
   }
   
   // Proses login user
   public function login($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('users');


        if($result->num_rows() == 1){
          return $result->row(0)->user_id;
       } else {
           return false;
       }
   }

   // Mendapatkan level user
    function getLevel($user_id)
    {
        // Dapatkan data user berdasar $user_id
        $this->db->select('fk_level_id');
        $this->db->where('user_id', $user_id);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0)->fk_level_id;
        } else {
         return false;
        }
    }

    function get_user_details($user_id)
    {
        $this->db->join('level', 'level.level_id = users.fk_level_id', 'left');
        $this->db->where('user_id', $user_id);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }

    public function getData()
  {
    //$get eksekusi fungsi select
    //hasil eksesusi = "select * from users
    $query = $this->db->get('users');
    //untuk merubah table menjadi array
    return $query->result_array();
  }

  public function tambah($data) { 
    if ($this->db->insert("users", $data)) { 
      return true; 
    } 
  }

  public function delete($id) { 
    if ($this->db->delete("users", "user_id = ".$id)) {
      return true; 
    } 
  }

  public function update($id) { 
    $data = array(
      /* 'employee_id' yang dikiri harus sama seperti di table
      'employee_id' yang dikanan harus menurut name inputnya */
      'nama' => $this->input->post('nama'),
      'kodepos' => $this->input->post('kodepos'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
    );
    /* jika semua sama sperti di table
    gunakan versi simple seprti berikut */
    $data = $this->input->post();
    //mengeset where id=$id
    $this->db->where('user_id',$id);
    /*eksekusi update employee set $data from employee where id=$id
    jika berhasil return berhasil */
    if($this->db->update("users",$data)){
      return "Berhasil";
    }
  } 
 }
