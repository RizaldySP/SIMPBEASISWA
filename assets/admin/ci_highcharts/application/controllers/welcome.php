<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->model('pendapatan');
	}
	
	public function index()
	{
		$data=array();
		foreach($this->pendapatan->get()->result_array() as $row)
			$data[] = (int) $row['hasil'];
		$this->load->view('welcome_message',array('data'=>$data));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */