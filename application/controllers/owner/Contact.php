<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/Contacta_admin');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['tentang'] = $this->Contacta_admin->tampil_contact();
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-contact',$data);
		$this->load->view('element/owner/owner-footer');
	}
	public function delete_contact(){
		$idtentang = $this->uri->segment(4);
		$this->Contacta_admin->delete($idtentang);
		redirect('owner/contact');
	}
} 
?>