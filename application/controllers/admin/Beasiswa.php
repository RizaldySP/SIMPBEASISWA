<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('beasiswa_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $beasiswa = $this->beasiswa_model->listing();
	   $data = array ('title' => 'Data Beasiswa',
                    'beasiswa'  => $beasiswa,
                    'isi'   =>  'admin/beasiswa/list');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
	}

  //tambah data beasiswa
	public function tambah()
	{
    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_beasiswa','Nama beasiswa','required',
      array('required'  => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

	   $data = array ('title' => 'Tambah Beasiswa',
                    'isi'   =>  'admin/beasiswa/tambah');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
	}else{
      $i = $this->input;
      $data = array('nama_beasiswa'  => $i->post('nama_beasiswa'),
                    'periode'    => $i->post('periode'),
                    'persyaratan'    => $i->post('persyaratan'),
                    'tanggal_dibuka' => $i->post('tanggal_dibuka'),
                    'tanggal_ditutup'=> $i->post('tanggal_ditutup'),
                    'status'         => 'Dibuka',
                    'st'             => '1');
      $this->beasiswa_model->tambah($data);
      $this->session->set_flashdata('sukses','Data Telah Ditambah');
      redirect(base_url('admin/beasiswa'),'refresh');
    }
    //end masuk database
  }

  //Edit data beasiswa
  public function edit($id_beasiswa)
  {
    //mengambil detail data dari beasiswa_model
    $beasiswa = $this->beasiswa_model->detail($id_beasiswa);

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_beasiswa','Nama beasiswa','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Edit beasiswa',
                    'beasiswa'  =>  $beasiswa,
                    'isi'   =>  'admin/beasiswa/edit');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_beasiswa'    => $id_beasiswa,
                    'nama_beasiswa'  => $i->post('nama_beasiswa'),
                    'periode'    => $i->post('periode'),
                    'persyaratan'    => $i->post('persyaratan'),
                    'tanggal_dibuka' => $i->post('tanggal_dibuka'),
                    'tanggal_ditutup'=> $i->post('tanggal_ditutup'),
                    'status'         => 'Dibuka',
                    'st'             => '1');
      $this->beasiswa_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Diedit');
      redirect(base_url('admin/beasiswa'),'refresh');
    }
    //end masuk database
  }

  public function status($id_beasiswa)
  {
    //mengambil detail data dari beasiswa_model
    $beasiswa = $this->beasiswa_model->detail($id_beasiswa);

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_beasiswa','Nama beasiswa','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Edit beasiswa',
                    'beasiswa'  =>  $beasiswa,
                    'isi'   =>  'admin/beasiswa/edit');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_beasiswa'    => $id_beasiswa,
                    'nama_beasiswa'  => $i->post('nama_beasiswa'),
                    'periode'        => $i->post('periode'),
                    'persyaratan'    => $i->post('persyaratan'),
                    'tanggal_dibuka' => $i->post('tanggal_dibuka'),
                    'tanggal_ditutup'=> $i->post('tanggal_ditutup'),
                    'status'         => 'Ditutup',
                    'st'             => '0');
      $this->beasiswa_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Dirubah');
      redirect(base_url('admin/beasiswa'),'refresh');
    }
    //end masuk database
  }

  //delete beasiswa
  public function delete($id_beasiswa){
    $data = array('id_beasiswa' => $id_beasiswa);
    $this->beasiswa_model->delete($data);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      echo "<script>alert('Data sudah terdata, tidak bisa dihapus');</script>";
      $this->session->set_flashdata('sukses', 'Mohon maaf data gagal dihapus');
      redirect(base_url('admin/beasiswa'),'refresh');
    }else{
      $this->session->set_flashdata('sukses', 'Data Telah dihapus');
      redirect(base_url('admin/beasiswa'),'refresh');
    }
  }
}
