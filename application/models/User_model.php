<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //listing all user
  public function listing()
  {
    $this->db->select('users.*,
                      fakultas.nama_fakultas');
    $this->db->from('users');
    $this->db->join('fakultas', 'fakultas.id_fakultas = users.id_fakultas', 'left');
    $this->db->order_by('id_user', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //detail user
  public function detail($id_user)
  {
    $this->db->select('users.*,
                      fakultas.nama_fakultas');
    $this->db->from('users');
    $this->db->join('fakultas', 'fakultas.id_fakultas = users.id_fakultas', 'left');
    $this->db->where('id_user',$id_user);
    $this->db->order_by('id_user', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //login user
  public function masuk($username,$password)
  {
    $this->db->select('users.*,
                      fakultas.nama_fakultas');
    $this->db->from('users');
    $this->db->join('fakultas', 'fakultas.id_fakultas = users.id_fakultas', 'left');
    $this->db->where(array('username'   =>  $username,
                           'password'   =>  SHA1($password)));
    $this->db->order_by('id_user', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah
  public function tambah($data){
    $this->db->insert('users',$data);
  }

  //delete
  public function delete($data){
    $this->db->where('id_user',$data['id_user']);
    $this->db->delete('users',$data);
  }

  //edit
  public function edit($data){
    $this->db->where('id_user',$data['id_user']);
    $this->db->update('users',$data);
  }






}
