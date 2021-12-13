<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('beasiswa_model');
	}

	public function index()
	{
		$pengumuman = $this->beasiswa_model->listing_home();
		$data = array('title' => 'Home',
									'pengumuman' => $pengumuman );
    $this->load->view('home/list',$data, FALSE);
	}

}
