<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_model extends CI_Model {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //listing all fakultas
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('fakultas');
    $this->db->order_by('id_fakultas', 'desc');
    $query = $this->db->get();
    return $query->result();
  }


  //detail fakultas
    public function detail($id_fakultas)
    {
      $this->db->select('*');
      $this->db->from('fakultas');
      $this->db->where('id_fakultas',$id_fakultas);
      $this->db->order_by('id_fakultas', 'desc');
      $query = $this->db->get();
      return $query->row();
    }

  //tambah
  public function tambah($data){
    $this->db->insert('fakultas',$data);
  }

  //delete
  public function delete($data){
    $this->db->where('id_fakultas',$data['id_fakultas']);
    $this->db->delete('fakultas',$data);
  }
  //edit
  public function edit($data){
    $this->db->where('id_fakultas',$data['id_fakultas']);
    $this->db->update('fakultas',$data);
  }

  //listing all fakultas
  public function listing_fakultas()
  {
    $this->db->select('count(nama_fakultas) as jml_fakultas');
    $this->db->from('fakultas');
    return $this->db->get()->row()->jml_fakultas;
  }

}
