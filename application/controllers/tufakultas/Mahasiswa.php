<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa_model');
    $this->load->model('prodi_model');
    $this->load->model('fakultas_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  public function get_prodi()
  {
      $id = $this->input->post('id');
      $data = $this->prodi_model->get_prodi($id);
      echo json_encode($data);
  }

  //index tampil data list
	public function index()
	{
     $id_fakultas = $this->session->userdata('id_fakultas');
     $mahasiswa = $this->mahasiswa_model->listing($id_fakultas);
	   $data = array ('title' => 'Data Mahasiswa',
                    'mahasiswa'  => $mahasiswa,
                    'isi'   =>  'tufakultas/mahasiswa/list');
     $this->load->view('tufakultas/layout/wrapper' ,$data, FALSE);
	}

  //tambah datamahasiswa
	public function tambah()
	{
    $prodi = $this->prodi_model->listing();
    $fakultas = $this->fakultas_model->listing();
    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_mahasiswa','Namamahasiswa','required',
      array('required'  => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

	   $data = array ('title' => 'Tambah Mahasiswa',
                    'prodi'  => $prodi,
                    'fakultas'  => $fakultas,
                    'isi'   =>  'tufakultas/mahasiswa/tambah');
     $this->load->view('tufakultas/layout/wrapper' ,$data, FALSE);
     //masuk ke database
	}else{
      $i = $this->input;
      $data = array('id_fakultas'     => $i->post('id_fakultas'),
                    'id_prodi'     => $i->post('id_prodi'),
                    'nim'  => $i->post('nim'),
                    'nama_mahasiswa'  => $i->post('nama_mahasiswa'),
                    'username'     => $i->post('username'),
                    'password'     => SHA1($i->post('password')),
                    'st'           => '1');
      $this->mahasiswa_model->tambah($data);
      $this->session->set_flashdata('sukses','Data Telah Ditambah');
      redirect(base_url('tufakultas/mahasiswa'),'refresh');
    }
    //end masuk database
  }

  //Edit datamahasiswa
  public function edit($id_mahasiswa)
  {
    //mengambil detail data darimahasiswa_model
    $mahasiswa = $this->mahasiswa_model->detail($id_mahasiswa);
    $prodi = $this->prodi_model->listing();
    $fakultas = $this->fakultas_model->listing();

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_mahasiswa','Namamahasiswa','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Editmahasiswa',
                    'mahasiswa'  =>  $mahasiswa,
                    'fakultas'   => $fakultas,
                    'prodi' => $prodi,
                    'isi'   =>  'tufakultas/mahasiswa/edit');
     $this->load->view('tufakultas/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_mahasiswa'    => $id_mahasiswa,
                    'id_fakultas'     => $i->post('id_fakultas'),
                    'id_prodi'     => $i->post('id_prodi'),
                    'nim'  => $i->post('nim'),
                    'nama_mahasiswa'  => $i->post('nama_mahasiswa'),
                    'username'     => $i->post('username'),
                    'password'     => SHA1($i->post('password')),
                    'st'           => '1');
      $this->mahasiswa_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Diedit');
      redirect(base_url('tufakultas/mahasiswa'),'refresh');
    }
    //end masuk database
  }

  //deletemahasiswa
  public function delete($id_mahasiswa){
    $data = array('id_mahasiswa' => $id_mahasiswa);
    $this->mahasiswa_model->delete($data);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      echo "<script>alert('Data sudah terdata, tidak bisa dihapus');</script>";
      $this->session->set_flashdata('sukses', 'Mohon maaf data gagal dihapus');
      redirect(base_url('tufakultas/mahasiswa'),'refresh');
    }else{
      $this->session->set_flashdata('sukses', 'Data Telah dihapus');
      redirect(base_url('tufakultas/mahasiswa'),'refresh');
    }
  }
}
