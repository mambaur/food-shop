<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_bukti');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";
		}
	}

	function index(){
		$data['bukti'] = $this->MA_bukti->tampil_bukti();
		$this->load->view('element/admin/admin-header');
		$this->load->view('admin/admin-bukti',$data);
		$this->load->view('element/admin/admin-footer');
	}

	public function hapus_bukti(){
		$idbukti = $this->uri->segment(4);
		$this->MA_bukti->hapus_bukti($idbukti);
		redirect('admin/admin-bukti');
	}
} 
?>