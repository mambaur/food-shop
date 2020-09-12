<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('owner/Transaksi_owner');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";
		}
	}

	public function index(){
		$data['total'] = $this->Transaksi_owner->totalPemasukan();
		$data['keranjang'] = $this->db->query("SELECT * FROM pesan JOIN keranjang ON pesan.id_pesan=keranjang.pesan_id_pesan")->num_rows();
		$data['pesan'] = $this->Transaksi_owner->tampil_pesan();
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-laporan',$data);
		$this->load->view('element/owner/owner-footer');
	}

	public function sort(){
		$bulan = $this->input->post("bulan");
		if ($bulan==13) {
			$data['pesan'] = $this->Transaksi_owner->tampil_pesan();
			$this->load->view('element/Owner/Header_owner');
			$this->load->view('Owner_view/VO_laporan',$data);
			$this->load->view('element/Owner/Footer_owner');
		}else{
			$data['pesan'] = $this->Transaksi_owner->sorting($bulan);
			$this->load->view('element/Owner/Header_owner');
			$this->load->view('Owner_view/VO_laporan',$data);
			$this->load->view('element/Owner/Footer_owner');
		}

		// $data['total'] = $this->Transaksi_owner->totalPemasukan();
		// $data['keranjang'] = $this->db->query("SELECT * FROM pesan JOIN keranjang ON pesan.id_pesan=keranjang.pesan_id_pesan")->num_rows();
		
	}
} 
?>