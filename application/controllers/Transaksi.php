<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_transaksi');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		$iduser = $this->session->userdata("iduser");
		$data['pesan'] = $this->M_transaksi->tampil_pesan($iduser);
		$this->load->view('element/Header');
		$this->load->view('V_transaksi',$data);
		$this->load->view('element/Footer');
	}
	public function detail_transaksi(){
		$iduser = $this->session->userdata("iduser");
		$data['status'] = $this->input->post("status");
		$data['kodepos'] = $this->input->post("kode_pos");
		$data['idpesan'] = $this->input->post('id_pesan');
		$idpesan2 =$this->input->post('id_pesan');
		$data['inv'] = $this->M_transaksi->invoice($idpesan2,$iduser);
		$data['inv2'] = $this->M_transaksi->user($iduser);
		$data['pengiriman'] = $this->input->post('harga_kirim');
		$data['total2'] = $this->input->post('total_pesan');
		$this->load->view('V_invoice',$data);
	}
}
?>