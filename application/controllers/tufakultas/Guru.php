<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('guru_model');
    $this->load->model('mapel_model');
    //proteksi halaman
    $this->simple_guru->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $guru = $this->guru_model->detailprofile();
	   $data = array ('title' => 'Data Guru',
                    'guru'  => $guru,
                    'isi'   =>  'guru/guru/list');
     $this->load->view('guru/layout/wrapper' ,$data, FALSE);
	}

  //Edit data user
  public function edit()
  {
    //mengambil detail data dari guru_model
    $id_guru = $this->session->userdata('id_guru');
    $guru = $this->guru_model->detail($id_guru);
    $mapel = $this->mapel_model->listing();

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_guru','Nama lengkap','required',
      array('required' => '%s harus diisi'));

    $valid->set_rules('password','Passwrod','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Edit guru',
                    'guru'  =>  $guru,
                    'mapel' =>  $mapel,
                    'isi'   =>  'guru/guru/edit');
     $this->load->view('guru/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_guru'      => $id_guru,
                    'id_mapel'     => $i->post('id_mapel'),
                    'nama_guru'    => $i->post('nama_guru'),
                    'guruname'     => $i->post('guruname'),
                    'password'     => SHA1($i->post('password')),
                    'status'       => 'Aktif',
                    'st'           => '1');
      $this->guru_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Diedit');
      redirect(base_url('guru/guru'),'refresh');
    }
    //end masuk database
  }

}
