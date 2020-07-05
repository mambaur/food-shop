<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->helper(array('url'));

	}
 
	public function index(){
		// $this->session->sess_destroy();
		$this->session->unset_userdata('status');
		redirect(base_url('Login'));
	}
	
}
?>