<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') == "222"){
			redirect('admin/beranda','refresh');
		}else if ($this->session->userdata('owner') == "333") {
			redirect('owner/beranda','refresh');
		}
 
	}

	function index(){
		$this->load->view('admin/login');
	}
} 
?>