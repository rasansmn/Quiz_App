<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 
	function __construct(){
		parent::__construct();
		$this->load->model('authmodel');
	}	

	public function index()
	{
		$this->load->view('view_question');
	}
	
	public function admin()
	{
	    $data = array("message"=>"");
		$this->load->view('admin_login', $data);
	}
	
	public function admin_log()
	{
		$retval = $this->authmodel->login();
		if($retval){
			$this->load->view('admin');
		}else{
			$data = array("message"=>"Invalid Login!");
			$this->load->view('admin_login', $data);
		}
	}
	
}
