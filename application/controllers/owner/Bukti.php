<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/Bukti_admin');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['bukti'] = $this->Bukti_admin->tampil_bukti();
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-bukti',$data);
		$this->load->view('element/owner/owner-footer');
	}

	public function delete_bukti(){
		$idbukti = $this->uri->segment(4);
		$this->Bukti_admin->hapus_bukti($idbukti);
		redirect('owner/bukti');
	}
} 
?>