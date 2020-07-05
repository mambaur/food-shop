<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_detail extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_detailproduk');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') == "login"){
			redirect('Welcome','refresh');
		}
	}

	public function index(){
		
		$this->read();
	}

	public function read(){
		$id = $this->uri->segment(2);
		$data['data'] = $this->M_detailproduk->tampil_kategori();
		$data['produk'] = $this->M_detailproduk->tampil_produk($id);
		$this->load->view('U_detail',$data);
		$this->load->view('element/footer');
	}
}
?>