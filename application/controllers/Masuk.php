<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');
    $this->load->model('prodi_model');
    $this->load->model('fakultas_model');
	}

  //index tampil data list, folder diluar admin dan penyuluh
	public function index()
	{
		//end validation
		$data = array('title' => 'Login Admin');
    $this->load->view('masuk/list',$data, FALSE);
	}

	//index tampil data list, folder diluar admin dan penyuluh
	public function login()
	{
    //validation
		$this->form_validation->set_rules('username','Username','required',
				array('required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
				array('required' => '%s harus diisi'));

		if($this->form_validation->run()){
			$username	=	$this->input->post('username');
			$password	=	$this->input->post('password');
			//proses simple Login
			$this->simple_login->masuk($username,$password);
		}

		//end validation
		$data = array('title' => 'Login');
    $this->load->view('masuk/login',$data, FALSE);
	}

	public function mahasiswa()
	{
    //validation
		$this->form_validation->set_rules('username','Username','required',
				array('required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
				array('required' => '%s harus diisi'));

		if($this->form_validation->run()){
			$username	=	$this->input->post('username');
			$password	=	$this->input->post('password');
			//proses simple Login
			$this->simple_mahasiswa->masuk($username,$password);
		}

		//end validation
		$data = array('title' => 'Login Mahasiswa');
    $this->load->view('masuk/mahasiswa',$data, FALSE);
	}

	//tambah data user
	public function registrasi_mahasiswa()
	{
		$prodi = $this->prodi_model->listing();
    $fakultas = $this->fakultas_model->listing();
    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_mahasiswa','Nama','required',
      array('required' => '%s harus diisi'));

		$valid->set_rules('username','Username','required|is_unique[users.username]',
			array('required' => '%s harus diisi',
						'is_unique' => '%s sudah terdaftar'));

    $valid->set_rules('password','Passwrod','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

	   $data = array ('title' => 'Registrasi Akun Mahasiswa',
									  'prodi'  => $prodi,
									  'fakultas'  => $fakultas,
                    'isi'   =>  'masuk/registrasi_mahasiswa');
     $this->load->view('masuk/registrasi_mahasiswa' ,$data, FALSE);
     //masuk ke database
	}else{
      $i = $this->input;
      $data = array('id_prodi'        => $i->post('id_prodi'),
										'id_fakultas'        => $i->post('id_fakultas'),
										'nim'        => $i->post('nim'),
										'nama_mahasiswa'        => $i->post('nama_mahasiswa'),
										'tempat_lahir'        => $i->post('tempat_lahir'),
										'tanggal_lahir'        => $i->post('tanggal_lahir'),
                    'username'    => $i->post('username'),
                    'password'    => SHA1($i->post('password')),
                    'st' => '1');
      $this->mahasiswa_model->tambah($data);
      $this->session->set_flashdata('sukses','Selamat, berhasil membuat akun');
      redirect(base_url('masuk/mahasiswa'),'refresh');
    }
    //end masuk database
  }

	public function get_prodi()
  {
      $id = $this->input->post('id');
      $data = $this->prodi_model->get_prodi($id);
      echo json_encode($data);
  }

  //logout Admin
  public function logout()
  {
    //ambil fungsi logout dari simple_admin yang sudah disetting di autoload->libraries
    $this->simple_login->logout();
  }

	//logout Mahasiswa
  public function logout_mahasiswa()
  {
    //ambil fungsi logout dari simple_admin yang sudah disetting di autoload->libraries
    $this->simple_mahasiswa->logout();
  }





}
