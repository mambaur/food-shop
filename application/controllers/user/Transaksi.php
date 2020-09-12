<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Transaksi_model');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('login')."';
            </script>";
		}
	}

	public function index(){
		$iduser = $this->session->userdata("iduser");
		$data['pesan'] = $this->Transaksi_model->tampil_pesan($iduser);
		$this->load->view('element/header');
		$this->load->view('user/user-transaksi',$data);
		$this->load->view('element/footer');
	}
	public function detail(){
		$iduser = $this->session->userdata("iduser");
		$data['status'] = $this->input->post("status");
		$data['kodepos'] = $this->input->post("kode_pos");
		$data['idpesan'] = $this->input->post('id_pesan');
		$idpesan2 =$this->input->post('id_pesan');
		$data['inv'] = $this->Transaksi_model->invoice($idpesan2,$iduser);
		$data['inv2'] = $this->Transaksi_model->user($iduser);
		$data['pengiriman'] = $this->input->post('harga_kirim');
		$data['total2'] = $this->input->post('total_pesan');
		$this->load->view('user/user-invoice',$data);
	}
}
?>