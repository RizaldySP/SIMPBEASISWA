<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa_model extends CI_Model {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //listing all beasiswa
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('beasiswa');
    $this->db->order_by('id_beasiswa', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_beasiswa($id)
  {
    $this->db->select('*');
    $this->db->from('beasiswa');
    $this->db->where('nama_beasiswa', $id);
    $this->db->order_by('id_beasiswa', 'desc');
    $query = $this->db->get()->result();
    return $query;
  }

  public function listing_beasiswa()
  {
    $this->db->select('*');
    $this->db->from('beasiswa');
    $this->db->where_not_in('periode(select periode from pengajuan p join beasiswa b on b.nama_beasiswa
                            = p.nama_beasiswa where p.id_mahasiswa = id_mahasiswa)');
    $this->db->order_by('id_beasiswa', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //listing home
  public function listing_home()
  {
    $this->db->select('*');
    $this->db->from('beasiswa');
    $this->db->where('status','Dibuka');
    $this->db->order_by('id_beasiswa', 'desc');
    $this->db->limit('1');
    $query = $this->db->get();
    return $query->result();
  }


  //detail beasiswa
    public function detail($id_beasiswa)
    {
      $this->db->select('*');
      $this->db->from('beasiswa');
      $this->db->where('id_beasiswa',$id_beasiswa);
      $this->db->order_by('id_beasiswa', 'desc');
      $query = $this->db->get();
      return $query->row();
    }

  //tambah
  public function tambah($data){
    $this->db->insert('beasiswa',$data);
  }

  //delete
  public function delete($data){
    $this->db->where('id_beasiswa',$data['id_beasiswa']);
    $this->db->delete('beasiswa',$data);
  }
  //edit
  public function edit($data){
    $this->db->where('id_beasiswa',$data['id_beasiswa']);
    $this->db->update('beasiswa',$data);
  }

  // //listing all beasiswa
  // public function listingbeasiswa()
  // {
  //   $this->db->select('count(nama_beasiswa) as jml_beasiswa');
  //   $this->db->from('beasiswa');
  //   return $this->db->get()->row()->jml_beasiswa;
  // }

}
