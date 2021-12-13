<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa_model');
    $this->load->model('prodi_model');
    $this->load->model('fakultas_model');
    //proteksi halaman
    $this->simple_mahasiswa->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $id_mahasiswa = $this->session->userdata('id_mahasiswa');
     $mahasiswa  = $this->mahasiswa_model->detail($id_mahasiswa);
	   $data = array ('title' => 'Data Mahasiswa',
                    'mahasiswa'  => $mahasiswa,
                    'isi'   =>  'mahasiswa/profile/list');
     $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);
	}


  public function edit_profile_foto($id_mahasiswa)
  {
    $id_mahasiswa = $this->session->userdata('id_mahasiswa');
    $mahasiswa  = $this->mahasiswa_model->detail($id_mahasiswa);
    $fakultas   = $this->fakultas_model->listing();
    $prodi   = $this->prodi_model->listing();

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_mahasiswa','Nama Mahasiswa','required',
      array('required' => '%s harus diisi'));

      //folder upload gambar
    if($valid->run()){
      //check apabila gambar diganti
      if(!empty($_FILES['foto']['name'])){

      $config['upload_path']    = './assets/upload/foto/';
      $config['allowed_types']  = 'jpg|png|jpeg';
      $config['max_size']       = '10000';//dalam KB
      $config['max_width']      = '10000';
      $config['max_height']     = '10000';

      $this->load->library('upload',$config);

      if (! $this->upload->do_upload('foto')){
      //end validasi

     $data = array ('title' => 'Edit Profile',
                    'mahasiswa'  => $mahasiswa,
                    'fakultas'  => $fakultas,
                    'prodi'  => $prodi,
                    'error'     => $this->upload->display_errors(),
                    'isi'   =>  'mahasiswa/profile/upload_foto');
     $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{

      $upload_foto = array('upload_data' =>  $this->upload->data());

      //create thumbnail Gambar
      $config['image_library']   = 'gd2';
      $config['source_image']    = './assets/upload/foto/'.$upload_foto['upload_data']['file_name'];
      //lokasi folder thumbnail
      $config['new_image']       = './assets/upload/foto/thumbs/';
      $config['create_thumb']    = TRUE;
      $config['maintain_ratio']  = TRUE;
      $config['width']           = 250;//bentuk pixel
      $config['height']          = 250;//bentuk pixel
      $config['thumb_marker']    = '';

      $this->load->library('image_lib', $config);

      $this->image_lib->resize();
      //end create thumbnail

      $i = $this->input;

      $data = array('id_mahasiswa'   => $mahasiswa->id_mahasiswa,
                    // 'id_fakultas'    => $i->post('id_fakultas'),
                    // 'id_prodi'       => $i->post('id_prodi'),
                    'foto'           => $upload_foto['upload_data']['file_name'],
                    // 'nim'            => $i->post('nim'),
                    // 'nama_mahasiswa' => $i->post('nama_mahasiswa'),
                    // 'tempat_lahir'   => $i->post('tempat_lahir'),
                    // 'tanggal_lahir'  => $i->post('tanggal_lahir'),
                    // 'username'       => $i->post('username'),
                    // 'password'       => SHA1($i->post('password')),
                    'st'             => '1');

      $this->mahasiswa_model->edit($data);
      $this->session->set_flashdata('sukses','Foto berhasil diupload');
      redirect(base_url('mahasiswa/profile'),'refresh');
    }}else{
      //edit produk tanpa edit gambar
      $i = $this->input;

      $data = array('id_mahasiswa'   => $mahasiswa->id_mahasiswa,
                    // 'id_fakultas'    => $i->post('id_fakultas'),
                    // 'id_prodi'       => $i->post('id_prodi'),
                    // 'foto'           => $upload_foto['upload_data']['file_name'],
                    // 'nim'            => $i->post('nim'),
                    // 'nama_mahasiswa' => $i->post('nama_mahasiswa'),
                    // 'tempat_lahir'   => $i->post('tempat_lahir'),
                    // 'tanggal_lahir'  => $i->post('tanggal_lahir'),
                    // 'username'       => $i->post('username'),
                    // 'password'       => SHA1($i->post('password')),
                    'st'             => '1');

      $this->mahasiswa_model->edit($data);
      $this->session->set_flashdata('sukses','Foto berhasil diupload');
      redirect(base_url('mahasiswa/profile'),'refresh');
    }}

      //end masuk database
      $data = array ('title' => 'Edit Profile',
                     'mahasiswa'  => $mahasiswa,
                     'fakultas'  => $fakultas,
                     'prodi'  => $prodi,
                     'isi'   =>  'mahasiswa/profile/upload_foto');
      $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);
  }

  //Profile
	public function edit_profile()
	{
		// ambil data login dari session
    $id_mahasiswa = $this->session->userdata('id_mahasiswa');
    $mahasiswa  = $this->mahasiswa_model->detail($id_mahasiswa);
    $fakultas   = $this->fakultas_model->listing();
    $prodi   = $this->prodi_model->listing();

		//validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_mahasiswa','Nama Mahasiswa','required',
      array('required' => '%s harus diisi'));

		if($valid->run()==FALSE){
		//end validasi

    $data = array ('title' => 'Edit Profile',
                   'mahasiswa'  => $mahasiswa,
                   'fakultas'  => $fakultas,
                   'prodi'  => $prodi,
                   'isi'   =>  'mahasiswa/profile/edit');
    $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);

		//masuk ke database
		}else{

			 $i = $this->input;
	     	//apabila password kurang dari 8, maka password tidak diganti
        $data = array('id_mahasiswa'   => $mahasiswa->id_mahasiswa,
                      'id_fakultas'    => $i->post('id_fakultas'),
                      'id_prodi'       => $i->post('id_prodi'),
                      'foto'           => $i->post('foto'),
                      'nim'            => $i->post('nim'),
                      'nama_mahasiswa' => $i->post('nama_mahasiswa'),
                      'tempat_lahir'   => $i->post('tempat_lahir'),
                      'tanggal_lahir'  => $i->post('tanggal_lahir'),
                      // 'username'       => $i->post('username'),
                      // 'password'       => SHA1($i->post('password')),
                      'st'             => '1');

       $this->mahasiswa_model->edit($data);
       $this->session->set_flashdata('sukses','Data Telah Diedit');
       redirect(base_url('mahasiswa/profile'),'refresh');
		}
	 }

   //Profile
 	public function edit_username_password()
 	{
 		// ambil data login dari session
     $id_mahasiswa = $this->session->userdata('id_mahasiswa');
     $mahasiswa  = $this->mahasiswa_model->detail($id_mahasiswa);
     $fakultas   = $this->fakultas_model->listing();
     $prodi   = $this->prodi_model->listing();

 		//validasi input data
     $valid = $this->form_validation;

     $valid->set_rules('password','Password','required',
       array('required' => '%s harus diisi'));

 		if($valid->run()==FALSE){
 		//end validasi

     $data = array ('title' => 'Edit Profile',
                    'mahasiswa'  => $mahasiswa,
                    'fakultas'  => $fakultas,
                    'prodi'  => $prodi,
                    'isi'   =>  'mahasiswa/profile/edit_username_password');
     $this->load->view('mahasiswa/layout/wrapper' ,$data, FALSE);

 		//masuk ke database
 		}else{

 			 $i = $this->input;
 	     	//apabila password kurang dari 8, maka password tidak diganti
         $data = array('id_mahasiswa'   => $mahasiswa->id_mahasiswa,
                       // 'id_fakultas'    => $i->post('id_fakultas'),
                       // 'id_prodi'       => $i->post('id_prodi'),
                       // 'foto'           => $i->post('foto'),
                       // 'nim'            => $i->post('nim'),
                       // 'nama_mahasiswa' => $i->post('nama_mahasiswa'),
                       // 'tempat_lahir'   => $i->post('tempat_lahir'),
                       // 'tanggal_lahir'  => $i->post('tanggal_lahir'),
                       'username'       => $i->post('username'),
                       'password'       => SHA1($i->post('password')),
                       'st'             => '1');

        $this->mahasiswa_model->edit($data);
        $this->session->set_flashdata('sukses','Data Telah Diedit');
        redirect(base_url('mahasiswa/profile'),'refresh');
 			 //end data update
 		}
 		//end masuk database
 	}


}
