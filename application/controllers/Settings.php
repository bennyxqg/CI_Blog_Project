<?php
class Settings extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	function index(){
		$this->load->view('Admin/header');
		$this->load->view('Admin/settings');
		$this->load->view('Admin/footer');
	}
}

?>