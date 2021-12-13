<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('tugas_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $tugas = $this->tugas_model->listing();
	   $data = array ('title' => 'Data Tugas',
                    'tugas'  => $tugas,
                    'isi'   =>  'admin/tugas/list');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
	}

}
