<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('pengajuan_model');
    $this->load->model('mahasiswa_model');
    $this->load->model('beasiswa_model');
    //proteksi halaman
    $this->simple_mahasiswa->cek_login();
  }

  public function get_beasiswa()
  {
      $id = $this->input->post('id');
      $data = $this->beasiswa_model->get_beasiswa($id);
      echo json_encode($data);
  }

  //index tampil data list
	public function index()
	{
     $id_mahasiswa = $this->session->userdata('id_mahasiswa');
     $pengajuan = $this->pengajuan_model->listing_mahasiswa($id_mahasiswa);
     $data = array ('title' => 'Data pengajuan',
                    'pengajuan'  => $pengajuan,
                    'isi'   =>  'mahasiswa/pengajuan/list');
     $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);
	}


  public function tambah()
  {
    //ambil data
    // $id_mahasiswa = $this->session->userdata('id_mahasiswa');
    $mahasiswa = $this->mahasiswa_model->listing_data_mahasiswa();
    $beasiswa = $this->beasiswa_model->listing_beasiswa();

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_beasiswa','Deskripsi','required',
      array('required' => '%s harus diisi'));

      //folder upload file
    if($valid->run()){
      $config['upload_path']    = './assets/upload/file/';
      $config['allowed_types']  = 'pdf|docx';
      $config['max_size']       = '5000';//dalam KB
      // $config['max_width']      = '5000';
      // $config['max_height']     = '5000';

      $this->load->library('upload',$config);

      if (! $this->upload->do_upload('berkas')){
      //end validasi

     $data = array ('title'     => 'Tambah Pengajuan',
                    'mahasiswa'  => $mahasiswa,
                    'beasiswa'  => $beasiswa,
                    'error'     => $this->upload->display_errors(),
                    'isi'       =>  'mahasiswa/pengajuan/tambah');
     $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $upload_berkas = array('upload_data' =>  $this->upload->data());

      //create thumbnail Gambar
      $config['image_library']   = 'gd2';
      $config['source_image']    = './assets/upload/file/'.$upload_berkas['upload_data']['file_name'];
      //lokasi folder thumbnail
      $config['new_image']       = './assets/upload/file/thumbs/';
      $config['create_thumb']    = TRUE;
      $config['maintain_ratio']  = TRUE;
      // $config['width']           = 5000;//bentuk pixel
      // $config['height']          = 5000;//bentuk pixel
      $config['thumb_marker']    = '';

      $this->load->library('image_lib', $config);

      $this->image_lib->resize();
      //end create thumbnail

      $i = $this->input;

      $data = array('id_mahasiswa'      => $this->session->userdata('id_mahasiswa'),
                    'nama_beasiswa'   => $i->post('nama_beasiswa'),
                    'periode'    => $i->post('periode'),
                    //disimpan nama file
                    'berkas'            => $upload_berkas['upload_data']['file_name'],
                    'status'            => 'Proses',
                    'st'                => '1',
                    'tanggal_pengajuan'     => date('Y-m-d'));

      $this->pengajuan_model->tambah($data);
      $this->session->set_flashdata('sukses','Data Telah Ditambah');
      redirect(base_url('mahasiswa/pengajuan'),'refresh');
    }}
    //end masuk database
    $data = array ('title' => 'Tambah Pengajuan',
                   'mahasiswa'  => $mahasiswa,
                   'beasiswa' => $beasiswa,
                   'isi'   =>  'mahasiswa/pengajuan/tambah');
    $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);
  }


}
