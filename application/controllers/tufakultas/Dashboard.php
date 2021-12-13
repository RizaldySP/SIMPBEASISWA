<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengajuan_model');
		$this->load->model('mahasiswa_model');
		$this->simple_login->cek_login();
	}

	//index Halaman Utama Dashboard penyuluh
	public function index()
	{
		$id_fakultas = $this->session->userdata('id_fakultas');
		$jml_pengajuan = $this->pengajuan_model->listing_pengajuan($id_fakultas);
		$jml_mahasiswa = $this->mahasiswa_model->listing_mahasiswa($id_fakultas);
		$data = array('title' => 'Halaman Dashboard TU Fakultas',
									'jml_pengajuan'	=> $jml_pengajuan,
									'jml_mahasiswa'	=> $jml_mahasiswa,
									'isi'   => 'tufakultas/dashboard/list');
		$this->load->view('tufakultas/layout/wrapper',$data,FALSE);
	}

}
