<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
  protected $CI;
  //load model
  public function __construct()
  {
    $this->CI =& get_instance();
    //load data model user
    $this->CI->load->model('user_model');
  }

  //fungsi login
  public function masuk($username,$password){
    $check = $this->CI->user_model->masuk($username,$password);
    //apabila ada data user, maka create session login
    if($check){
      $id_user      = $check->id_user;
      $nama         = $check->nama;
      $id_fakultas         = $check->id_fakultas;
      $username     = $check->username;
      $akses_level  = $check->akses_level;

      //create session
      $this->CI->session->set_userdata('id_user',$id_user);
      $this->CI->session->set_userdata('nama',$nama);
      $this->CI->session->set_userdata('id_fakultas',$id_fakultas);
      $this->CI->session->set_userdata('username',$username);
      $this->CI->session->set_userdata('akses_level', $akses_level);
      // redirect ke halaman admin yang terprotek
    }if ($this->CI->session->userdata('akses_level') == "BAKM") {
      redirect(base_url('admin/dashboard'),'refresh');
    }elseif ($this->CI->session->userdata('akses_level') == "Mahasiswa") {
      redirect(base_url('mahasiswa/dashboard'),'refresh');
    }elseif ($this->CI->session->userdata('akses_level') == "TUFakultas") {
      redirect(base_url('tufakultas/dashboard'),'refresh');
    }else{
      //jikalau tidak ada username dan password salah, maka login lagi
      $this->CI->session->set_flashdata('warning','Username atau password salah');
      redirect(base_url('masuk/login'),'refresh');
    }
  }

  //fungsi cek login
  public function cek_login(){
    //memeriksa apakah session sudah ada atau belum, jika belum alihkan ke halaman login
    if ($this->CI->session->userdata('username')== "") {
      $this->CI->session->set_flashdata('warning','Anda belum login');
      redirect(base_url('masuk/login'),'refresh');
    }
  }

  //fungsi logout
  public function logout(){
    // membuang semua session yang telah diset pada saat login
    $this->CI->session->unset_userdata('id_user');
    $this->CI->session->unset_userdata('nama');
    $this->CI->session->unset_userdata('username');
    $this->CI->session->unset_userdata('akses_level');
    //setelah session dibuang, maka redirect ke login
    $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
    redirect(base_url('masuk/login'),'refresh');
  }


}
