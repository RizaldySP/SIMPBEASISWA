<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //listing all pengajuan
  public function listing()
  {
    $this->db->select('pengajuan.*,
                      beasiswa.nama_beasiswa,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    //end join
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function listing_beasiswa()
  {
    $this->db->select('pengajuan.*,
                      beasiswa.nama_beasiswa,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    //end join
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function list_pengajuan($id_fakultas)
  {
    $this->db->select('pengajuan.*,
                      beasiswa.nama_beasiswa,
                      mahasiswa.nim,
                      mahasiswa.id_fakultas,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    $this->db->where('mahasiswa.id_fakultas',$id_fakultas);
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    //end join
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function listing_export()
  {
    $this->db->select('pengajuan.*,
                      fakultas.nama_fakultas,
                      prodi.nama_prodi,
                      beasiswa.nama_beasiswa,
                      beasiswa.periode,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    $this->db->join('prodi', 'prodi.id_prodi = pengajuan.id_mahasiswa', 'left');
    $this->db->join('fakultas', 'fakultas.id_fakultas = pengajuan.id_mahasiswa', 'left');

    $this->db->like('pengajuan.nama_beasiswa', $this->input->post('nama_beasiswa'));
    $this->db->like('pengajuan.periode', $this->input->post('periode'));

    $this->db->group_by('pengajuan.nama_beasiswa');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function listing_export_data()
  {
    $this->db->select('pengajuan.*,
                      fakultas.nama_fakultas,
                      prodi.nama_prodi,
                      beasiswa.nama_beasiswa,
                      beasiswa.periode,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    $this->db->join('prodi', 'prodi.id_prodi = pengajuan.id_mahasiswa', 'left');
    $this->db->join('fakultas', 'fakultas.id_fakultas = pengajuan.id_mahasiswa', 'left');

    $this->db->like('pengajuan.nama_beasiswa', $this->input->post('nama_beasiswa'));
    $this->db->like('pengajuan.periode', $this->input->post('periode'));

    $this->db->where('pengajuan.status','Mendapat Beasiswa');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function listing_mahasiswa($id_mahasiswa)
  {
    $this->db->select('pengajuan.*,
                      beasiswa.nama_beasiswa,
                      mahasiswa.nama_mahasiswa,
                      mahasiswa.nim');
    $this->db->from('pengajuan');
    $this->db->where('pengajuan.id_mahasiswa',$id_mahasiswa);
    //join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    //end join
    $this->db->group_by('pengajuan.id_pengajuan');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //detail pengajuan
  public function detail($id_pengajuan)
  {
    $this->db->select('pengajuan.*,
                      beasiswa.nama_beasiswa,
                      beasiswa.periode,
                      mahasiswa.nim,
                      mahasiswa.tempat_lahir,
                      mahasiswa.tanggal_lahir,
                      mahasiswa.foto,
                      fakultas.nama_fakultas,
                      prodi.nama_prodi,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    $this->db->join('prodi', 'prodi.id_prodi = pengajuan.id_mahasiswa', 'left');
    $this->db->join('fakultas', 'fakultas.id_fakultas = pengajuan.id_mahasiswa', 'left');

    $this->db->where('id_pengajuan',$id_pengajuan);
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  public function listingcaripengajuan_bakm()
  {
    $this->db->select('pengajuan.*,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');

    $this->db->group_by('pengajuan.id_mahasiswa');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function datacaripengajuan_bakm()
  {
    $this->db->select('pengajuan.*,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    //end join
    $this->db->like('nama_mahasiswa', $this->input->post('nama_mahasiswa'));
    $query = $this->db->get();
    return $query->result();
  }

  public function listingcaripengajuan($id_fakultas)
  {
    $this->db->select('pengajuan.*,
                      beasiswa.nama_beasiswa,
                      beasiswa.periode,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');

    $this->db->where('mahasiswa.id_fakultas',$id_fakultas);
    $this->db->group_by('pengajuan.nama_beasiswa');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function datacaripengajuan($id_fakultas)
  {
    $this->db->select('pengajuan.*,
                      beasiswa.nama_beasiswa,
                      beasiswa.periode,
                      mahasiswa.nim,
                      mahasiswa.nama_mahasiswa');
    $this->db->from('pengajuan');
    // join database
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->join('beasiswa', 'beasiswa.nama_beasiswa = pengajuan.nama_beasiswa', 'left');
    //end join
    $this->db->where('mahasiswa.id_fakultas',$id_fakultas);
    $this->db->group_by('pengajuan.nama_beasiswa');
    $this->db->like('pengajuan.nama_beasiswa', $this->input->post('nama_beasiswa'));
    $this->db->like('pengajuan.periode', $this->input->post('periode'));
    $query = $this->db->get();
    return $query->result();
  }

  //tambah
  public function tambah($data){
    $this->db->insert('pengajuan',$data);
  }

  //delete
  public function delete($data){
    $this->db->where('id_pengajuan',$data['id_pengajuan']);
    $this->db->delete('pengajuan',$data);
  }
  //edit
  public function edit($data){
    $this->db->where('id_pengajuan',$data['id_pengajuan']);
    $this->db->update('pengajuan',$data);
  }

  public function listing_pengajuan_bakm()
  {
    $this->db->select('count(status) as jml_pengajuan');
    $this->db->from('pengajuan');
    return $this->db->get()->row()->jml_pengajuan;
  }

  public function listing_pengajuan($id_fakultas)
  {
    $this->db->select('pengajuan.*,
                      mahasiswa.id_fakultas,
                      count(status) as jml_pengajuan');
    $this->db->from('pengajuan');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengajuan.id_mahasiswa', 'left');
    $this->db->where('mahasiswa.id_fakultas',$id_fakultas);
    return $this->db->get()->row()->jml_pengajuan;
  }

}
