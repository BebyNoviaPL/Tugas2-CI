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
            'level' => $level
       );

       // Insert user
       return false;
   }
   
   // Proses login user
   public function login($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('users');


        if($result->num_rows() == 1){
           $data['user_id'] = $result->row(0)->user_id;
           $data['level'] = $result->row(0)->level;
           return $data;
       } else {
           return false;
       }
   }

   // Mendapatkan level user
    function get_user_level($user_id)
    {
        // Dapatkan data user berdasar $user_id
        $this->db->select('fk_level_id');
        $this->db->where('user_id', $user_id);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
         return false;
        }
    }

    public function update($id)
   {
    $set = $this->input->post();
     $this->db->where('user_id',$id);
    $this->db->update('users',$set);
   }
   public function delete($id)
   {
     $this->db->where('user_id',$id);
    $this->db->delete('users');
   }
    function get_user_details($user_id)
    {
        $this->db->join('levels', 'levels.level_id = users.fk_level_id', 'left');
        $this->db->where('user_id', $user_id);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }
}