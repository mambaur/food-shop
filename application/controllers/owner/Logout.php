<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('url'));
	}

	function index(){
		// $this->session->sess_destroy();
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('owner');
		redirect(base_url('admin/login'));
	}
} 
?>