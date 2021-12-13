<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('fakultas_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $user = $this->user_model->listing();
	   $data = array ('title' => 'Data Akses Login',
                    'user'  => $user,
                    'isi'   =>  'admin/user/list');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
	}

  //tambah data user
	public function tambah()
	{
    $fakultas = $this->fakultas_model->listing();
    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama','Nama lengkap','required',
      array('required' => '%s harus diisi'));

    $valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
      array('required' => '%s harus diisi',
            'min_length' => '%s minimal 6 karakter',
            'max_length' => '%s maksimal 32 karakter',
            'is_unique' => '%s sudah ada. Buat username baru.'));

    $valid->set_rules('password','Passwrod','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

	   $data = array ('title' => 'Tambah Akses Login',
                    'fakultas'  => $fakultas,
                    'isi'   =>  'admin/user/tambah');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
	}else{
      $i = $this->input;
      $data = array('nama'        => $i->post('nama'),
                    'id_fakultas'    => $i->post('id_fakultas'),
                    'username'    => $i->post('username'),
                    'password'    => SHA1($i->post('password')),
                    'akses_level' => $i->post('akses_level'));
      $this->user_model->tambah($data);
      $this->session->set_flashdata('sukses','Data Telah Ditambah');
      redirect(base_url('admin/user'),'refresh');
    }
    //end masuk database
  }

  //Edit data user
  public function edit($id_user)
  {
    //mengambil detail data dari user_model
    $user = $this->user_model->detail($id_user);
    $fakultas = $this->fakultas_model->listing();

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama','Nama lengkap','required',
      array('required' => '%s harus diisi'));

    $valid->set_rules('password','Passwrod','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Edit Akses Login',
                    'user'  =>  $user,
                    'fakultas'  => $fakultas,
                    'isi'   =>  'admin/user/edit');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_user'     => $id_user,
                    'nama'        => $i->post('nama'),
                    'id_fakultas'    => $i->post('id_fakultas'),
                    'username'    => $i->post('username'),
                    'password'    => SHA1($i->post('password')),
                    'akses_level' => $i->post('akses_level'));
      $this->user_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Diedit');
      redirect(base_url('admin/user'),'refresh');
    }
    //end masuk database
  }

  //delete user
  public function delete($id_user){
    $data = array('id_user' => $id_user);
    $this->user_model->delete($data);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      echo "<script>alert('Data sudah terdata, tidak bisa dihapus');</script>";
      $this->session->set_flashdata('sukses', 'Mohon maaf data gagal dihapus');
      redirect(base_url('admin/user'),'refresh');
    }else{
      $this->session->set_flashdata('sukses', 'Data Telah dihapus');
      redirect(base_url('admin/user'),'refresh');
    }
  }
}
