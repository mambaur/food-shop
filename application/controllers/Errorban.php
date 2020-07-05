<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorban extends CI_Controller {

	public function index(){
		$this->load->view('V_error');
	}
}
?>