<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_bukti');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['bukti'] = $this->MA_bukti->tampil_bukti();
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-bukti',$data);
		$this->load->view('element/owner/owner-footer');
	}

	public function delete_bukti(){
		$idbukti = $this->uri->segment(4);
		$this->MA_bukti->hapus_bukti($idbukti);
		redirect('owner/bukti');
	}
} 
?>