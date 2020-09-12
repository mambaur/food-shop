<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/Bukti_admin');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";
		}
	}

	function index(){
		$data['bukti'] = $this->Bukti_admin->tampil_bukti();
		$this->load->view('element/admin/admin-header');
		$this->load->view('admin/admin-bukti',$data);
		$this->load->view('element/admin/admin-footer');
	}

	public function hapus_bukti(){
		$idbukti = $this->uri->segment(4);
		$this->Bukti_admin->hapus_bukti($idbukti);
		redirect('admin/admin-bukti');
	}
} 
?>