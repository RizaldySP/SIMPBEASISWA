<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('pengajuan_model');
    $this->load->model('mahasiswa_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  //index tampil data list
	public function index()
	{
    $id_fakultas = $this->session->userdata('id_fakultas');
    $pengajuan = $this->pengajuan_model->list_pengajuan($id_fakultas);
    $cari_pengajuan = $this->pengajuan_model->listingcaripengajuan($id_fakultas);
    $cari_periode = $this->pengajuan_model->listingcaripengajuan($id_fakultas);
    $data = array ('title' => 'Data Pengajuan Mahasiswa',
                  'pengajuan'  => $pengajuan,
                  'cari_pengajuan'  => $cari_pengajuan,
                  'cari_periode'  => $cari_periode,
                  'isi'   =>  'tufakultas/pengajuan/list');
    $this->load->view('tufakultas/layout/wrapper' ,$data, FALSE);
	}

  public function status($id_pengajuan)
  {
    //mengambil detail data dari murid_model
    $pengajuan = $this->pengajuan_model->detail($id_pengajuan);

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_beasiswa','nama beasiswa','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Status Pengajuan',
                    'pengajuan'  =>  $pengajuan,
                    'isi'   =>  'tufakultas/pengajuan/status');
     $this->load->view('tufakultas/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_pengajuan'      => $id_pengajuan,
                    'id_mahasiswa'     => $i->post('id_mahasiswa'),
                    'nama_beasiswa'    => $i->post('nama_beasiswa'),
                    'periode'    => $i->post('periode'),
                    'berkas'     => $i->post('berkas'),
                    'status'     => $i->post('status'),
                    'keterangan'     => $i->post('keterangan'),
                    'st'           => '1',
                    'tanggal_verifikasi'     => date('Y-m-d'));
      $this->pengajuan_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Dirubah');
      redirect(base_url('tufakultas/pengajuan'),'refresh');
    }
    //end masuk database
  }

  public function cari_pengajuan()
  {
    //mengambil detail data dari murid_model
    $id_fakultas = $this->session->userdata('id_fakultas');
    $pengajuan = $this->pengajuan_model->datacaripengajuan($id_fakultas);
    $cari_pengajuan = $this->pengajuan_model->listingcaripengajuan($id_fakultas);
    $cari_periode = $this->pengajuan_model->listingcaripengajuan($id_fakultas);
    $data = array('title' => 'Data Pengajuan',
                  'cari_pengajuan' => $cari_pengajuan,
                  'cari_periode' => $cari_periode,
                  'pengajuan'  => $pengajuan,
                  'nama_beasiswa'	 => $this->input->post('nama_beasiswa'),
                  'periode'	 => $this->input->post('periode'),
                  'isi'   =>  'tufakultas/pengajuan/list');
    $this->load->view('tufakultas/layout/wrapper' ,$data, FALSE);
  }


  public function detail($id_pengajuan)
  {
    //mengambil detail data dari murid_model
    $pengajuan = $this->pengajuan_model->detail($id_pengajuan);
     $data = array ('title' => 'Detail Data Mahasiswa',
                    'pengajuan'  =>  $pengajuan,
                    'isi'   =>  'tufakultas/pengajuan/detail');
     $this->load->view('tufakultas/layout/wrapper' ,$data, FALSE);
  }

}
