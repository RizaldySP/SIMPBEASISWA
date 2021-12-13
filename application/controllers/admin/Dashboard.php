<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengajuan_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('fakultas_model');
		//proteksi halaman dashboard
		$this->simple_login->cek_login();
	}

	//index Halaman Utama Dashboard
	public function index()
	{
		$jml_pengajuan = $this->pengajuan_model->listing_pengajuan_bakm();
		$jml_mahasiswa = $this->mahasiswa_model->listing_mahasiswa_bakm();
		$jml_fakultas = $this->fakultas_model->listing_fakultas();
		$data = array('title' => 'Halaman Dashboard',
									'jml_pengajuan'	=> $jml_pengajuan,
									'jml_mahasiswa'	=> $jml_mahasiswa,
									'jml_fakultas'	=> $jml_fakultas,
									'isi'   => 'admin/dashboard/list');
		$this->load->view('admin/layout/wrapper',$data,FALSE);
	}

}
