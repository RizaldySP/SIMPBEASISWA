<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //listing all prodi
  public function listing()
  {
    $this->db->select('prodi.*,
                      fakultas.nama_fakultas');
    $this->db->from('prodi');
    $this->db->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas', 'left');
    $this->db->order_by('id_prodi', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_prodi($id)
  {
    $this->db->select('prodi.*,
                      fakultas.nama_fakultas');
      $this->db->from('prodi');
      $this->db->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas', 'left');
      $this->db->where('id_prodi', $id);
      $this->db->order_by('id_prodi', 'desc');
      $query = $this->db->get()->result();
      return $query;
  }

  //detail prodi
  public function detail($id_prodi)
  {
    $this->db->select('*');
    $this->db->from('prodi');
    $this->db->where('id_prodi',$id_prodi);
    $this->db->order_by('id_prodi', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah
  public function tambah($data){
    $this->db->insert('prodi',$data);
  }

  //delete
  public function delete($data){
    $this->db->where('id_prodi',$data['id_prodi']);
    $this->db->delete('prodi',$data);
  }

  //edit
  public function edit($data){
    $this->db->where('id_prodi',$data['id_prodi']);
    $this->db->update('prodi',$data);
  }
}
