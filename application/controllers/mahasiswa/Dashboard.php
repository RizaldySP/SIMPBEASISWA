<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->simple_mahasiswa->cek_login();
	}

	//index Halaman Utama Dashboard penyuluh
	public function index()
	{
		$data = array('title' => 'Halaman Dashboard Mahasiswa',
									'isi'   => 'mahasiswa/dashboard/list');
		$this->load->view('mahasiswa/layout/wrapper',$data,FALSE);
	}

}
