<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_mahasiswa {
  protected $CI;
  //load model
  public function __construct()
  {
    $this->CI =& get_instance();
    //load data model user
    $this->CI->load->model('mahasiswa_model');
  }

  //fungsi login
  public function masuk($username,$password){
    $check = $this->CI->mahasiswa_model->masuk($username,$password);
    //apabila ada data user, maka create session login
    if($check){
      $id_mahasiswa      = $check->id_mahasiswa;
      $nim               = $check->nim;
      $nama_mahasiswa    = $check->nama_mahasiswa;
      $tempat_lahir      = $check->tempat_lahir;
      $tanggal_lahir     = $check->tanggal_lahir;
      $username          = $check->username;
      $password          = $check->password;
      $nama_prodi        = $check->nama_prodi;
      $nama_fakultas     = $check->nama_fakultas;
      $st                = $check->st;

      //create session
      $this->CI->session->set_userdata('id_mahasiswa',$id_mahasiswa);
      $this->CI->session->set_userdata('nim',$nim);
      $this->CI->session->set_userdata('nama_mahasiswa',$nama_mahasiswa);
      $this->CI->session->set_userdata('tempat_lahir',$tempat_lahir);
      $this->CI->session->set_userdata('tanggal_lahir',$tanggal_lahir);
      $this->CI->session->set_userdata('username',$username);
      $this->CI->session->set_userdata('password',$password);
      $this->CI->session->set_userdata('nama_prodi',$nama_prodi);
      $this->CI->session->set_userdata('nama_fakultas',$nama_fakultas);
      $this->CI->session->set_userdata('st',$st);
      // redirect ke halaman admin yang terprotek
    }if ($this->CI->session->userdata('st') == "1") {
      redirect(base_url('mahasiswa/dashboard'),'refresh');
    }elseif ($this->CI->session->userdata('st') == "0") {
      $this->CI->session->set_flashdata('warning','Akun anda sudah dinonaktifkan oleh Admin');
      redirect(base_url('masuk/mahasiswa'),'refresh');
    }else{
      //jikalau tidak ada username dan password salah, maka login lagi
      $this->CI->session->set_flashdata('warning','Username atau Password salah');
      redirect(base_url('masuk/mahasiswa'),'refresh');
    }
  }

  //fungsi cek login
  public function cek_login(){
    //memeriksa apakah session sudah ada atau belum, jika belum alihkan ke halaman login
    if ($this->CI->session->userdata('username')== "") {
      $this->CI->session->set_flashdata('warning','Anda belum login');
      redirect(base_url('masuk/mahasiswa'),'refresh');
    }
  }

  //fungsi logout
  public function logout(){
    // membuang semua session yang telah diset pada saat login
    $this->CI->session->unset_userdata('id_mahasiswa');
    $this->CI->session->unset_userdata('nama_mahasiswa');
    $this->CI->session->unset_userdata('username');
    $this->CI->session->unset_userdata('st');
    //setelah session dibuang, maka redirect ke login
    $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
    redirect(base_url('masuk/mahasiswa'),'refresh');
  }

}
