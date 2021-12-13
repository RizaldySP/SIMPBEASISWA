<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('fakultas_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $fakultas = $this->fakultas_model->listing();
	   $data = array ('title' => 'Data Fakultas',
                    'fakultas'  => $fakultas,
                    'isi'   =>  'admin/fakultas/list');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
	}

  //tambah data fakultas
	public function tambah()
	{
    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_fakultas','Nama fakultas','required',
      array('required'  => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

	   $data = array ('title' => 'Tambah Fakultas',
                    'isi'   =>  'admin/fakultas/tambah');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
	}else{
      $i = $this->input;
      $data = array('nama_fakultas'  => $i->post('nama_fakultas'));
      $this->fakultas_model->tambah($data);
      $this->session->set_flashdata('sukses','Data Telah Ditambah');
      redirect(base_url('admin/fakultas'),'refresh');
    }
    //end masuk database
  }

  //Edit data fakultas
  public function edit($id_fakultas)
  {
    //mengambil detail data dari fakultas_model
    $fakultas = $this->fakultas_model->detail($id_fakultas);

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_fakultas','Nama fakultas','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Edit fakultas',
                    'fakultas'  =>  $fakultas,
                    'isi'   =>  'admin/fakultas/edit');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_fakultas'    => $id_fakultas,
                    'nama_fakultas'  => $i->post('nama_fakultas'));
      $this->fakultas_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Diedit');
      redirect(base_url('admin/fakultas'),'refresh');
    }
    //end masuk database
  }

  //delete fakultas
  public function delete($id_fakultas){
    $data = array('id_fakultas' => $id_fakultas);
    $this->fakultas_model->delete($data);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      echo "<script>alert('Data sudah terdata, tidak bisa dihapus');</script>";
      $this->session->set_flashdata('sukses', 'Mohon maaf data gagal dihapus');
      redirect(base_url('admin/fakultas'),'refresh');
    }else{
      $this->session->set_flashdata('sukses', 'Data Telah dihapus');
      redirect(base_url('admin/fakultas'),'refresh');
    }
  }
}
