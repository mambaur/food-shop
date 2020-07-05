<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_contact extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_contact');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['tentang'] = $this->MA_contact->tampil_contact();
		$this->load->view('element/Admin/Header_admin');
		$this->load->view('Admin_view/VA_contact',$data);
		$this->load->view('element/Admin/Footer_admin');
	}
	public function delete_contact(){
		$idtentang = $this->uri->segment(4);
		$this->MA_contact->delete($idtentang);
		redirect('Admin_controller/A_contact');
	}
} 
?>