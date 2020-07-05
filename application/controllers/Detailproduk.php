<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailproduk extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_detailproduk');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		
		$this->read();
	}

	public function read(){
		$id = $this->uri->segment(2);
		$data['data'] = $this->M_detailproduk->tampil_kategori();
		$data['produk'] = $this->M_detailproduk->tampil_produk($id);
		$this->load->view('element/Header');
		$this->load->view('V_detailproduk',$data);
		$this->load->view('element/Footer');
	}
}
?>