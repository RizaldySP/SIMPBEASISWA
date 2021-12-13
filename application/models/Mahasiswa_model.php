<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //listing all mahasiswa
  public function listing($id_fakultas)
  {
    $this->db->select('mahasiswa.*,
                      fakultas.nama_fakultas,
                      prodi.nama_prodi');
    $this->db->from('mahasiswa');
    // join database
    $this->db->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas', 'left');
    $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
    //end join
    $this->db->where('mahasiswa.id_fakultas',$id_fakultas);
    $this->db->order_by('id_mahasiswa', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function listing_data_mahasiswa()
  {
    $this->db->select('mahasiswa.*,
                      fakultas.nama_fakultas,
                      prodi.nama_prodi');
    $this->db->from('mahasiswa');
    // join database
    $this->db->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas', 'left');
    $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
    //end join
    $this->db->order_by('id_mahasiswa', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //listing all mahasiswa
  public function detailprofile()
  {
    $this->db->select('mahasiswa.*,
                      fakultas.nama_fakultas,
                      prodi.nama_prodi');
    $this->db->from('mahasiswa');
    $this->db->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas', 'left');
    $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
    $this->db->order_by('id_mahasiswa', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //detail mahasiswa
    public function detail($id_mahasiswa)
    {
      $this->db->select('mahasiswa.*,
                        fakultas.nama_fakultas,
                        prodi.nama_prodi');
      $this->db->from('mahasiswa');
      $this->db->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas', 'left');
      $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
      $this->db->where('id_mahasiswa',$id_mahasiswa);
      $this->db->order_by('id_mahasiswa', 'desc');
      $query = $this->db->get();
      return $query->row();
    }
  //
  //login mahasiswa
  public function masuk($username,$password)
  {
    $this->db->select('mahasiswa.*,
                      fakultas.nama_fakultas,
                      prodi.nama_prodi');
    $this->db->from('mahasiswa');
    $this->db->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas', 'left');
    $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
    $this->db->where(array('username'   =>  $username,
                           'password'   =>  SHA1($password)));
    $this->db->order_by('id_mahasiswa', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah
  public function tambah($data){
    $this->db->insert('mahasiswa',$data);
  }

  //delete
  public function delete($data){
    $this->db->where('id_mahasiswa',$data['id_mahasiswa']);
    $this->db->delete('mahasiswa',$data);
  }
  //edit
  public function edit($data){
    $this->db->where('id_mahasiswa',$data['id_mahasiswa']);
    $this->db->update('mahasiswa',$data);
  }

  public function listing_mahasiswa_bakm()
  {
    $this->db->select('count(nama_mahasiswa) as jml_mahasiswa');
    $this->db->from('mahasiswa');
    return $this->db->get()->row()->jml_mahasiswa;
  }

  //listing all mahasiswa
  public function listing_mahasiswa($id_fakultas)
  {
    $this->db->select('count(nama_mahasiswa) as jml_mahasiswa');
    $this->db->from('mahasiswa');
    $this->db->where('mahasiswa.id_fakultas',$id_fakultas);
    return $this->db->get()->row()->jml_mahasiswa;
  }

}
