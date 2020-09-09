<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_contact');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['tentang'] = $this->MA_contact->tampil_contact();
		$this->load->view('element/admin/admin-header');
		$this->load->view('admin/admin-contact',$data);
		$this->load->view('element/admin/admin-footer');
	}
	public function hapus_contact(){
		$idtentang = $this->uri->segment(4);
		$this->MA_contact->delete($idtentang);
		redirect('admin/contact');
	}
} 
?>