<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('prodi_model');
    $this->load->model('fakultas_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $prodi = $this->prodi_model->listing();
	   $data = array ('title' => 'Data prodi',
                    'prodi'  => $prodi,
                    'isi'   =>  'admin/prodi/list');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
	}

  //tambah data prodi
	public function tambah()
	{
    $fakultas = $this->fakultas_model->listing();
    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_prodi','Nama prodi','required',
      array('required'  => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

	   $data = array ('title' => 'Tambah prodi',
                    'fakultas' => $fakultas,
                    'isi'   =>  'admin/prodi/tambah');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
	}else{
      $i = $this->input;
      $data = array('id_fakultas' => $i->post('id_fakultas'),
                    'nama_prodi'  => $i->post('nama_prodi'));
      $this->prodi_model->tambah($data);
      $this->session->set_flashdata('sukses','Data Telah Ditambah');
      redirect(base_url('admin/prodi'),'refresh');
    }
    //end masuk database
  }

  //Edit data prodi
  public function edit($id_prodi)
  {
    //mengambil detail data dari prodi_model
    $prodi = $this->prodi_model->detail($id_prodi);
    $fakultas = $this->fakultas_model->listing();

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_prodi','Nama prodi','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Edit prodi',
                    'fakultas' => $fakultas,
                    'prodi'  =>  $prodi,
                    'isi'   =>  'admin/prodi/edit');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_prodi'    => $id_prodi,
                    'id_fakultas' => $i->post('id_fakultas'),
                    'nama_prodi'  => $i->post('nama_prodi'));
      $this->prodi_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Diedit');
      redirect(base_url('admin/prodi'),'refresh');
    }
    //end masuk database
  }

  //delete prodi
  public function delete($id_prodi){
    $data = array('id_prodi' => $id_prodi);
    $this->prodi_model->delete($data);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      echo "<script>alert('Data sudah terdata, tidak bisa dihapus');</script>";
      $this->session->set_flashdata('sukses', 'Mohon maaf data gagal dihapus');
      redirect(base_url('admin/prodi'),'refresh');
    }else{
      $this->session->set_flashdata('sukses', 'Data Telah dihapus');
      redirect(base_url('admin/prodi'),'refresh');
    }
  }
}
