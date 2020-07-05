<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class O_laporan extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Owner_models/MO_transaksi');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		$data['total'] = $this->MO_transaksi->totalPemasukan();
		$data['keranjang'] = $this->db->query("SELECT * FROM pesan JOIN keranjang ON pesan.id_pesan=keranjang.pesan_id_pesan")->num_rows();
		$data['pesan'] = $this->MO_transaksi->tampil_pesan();
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/VO_laporan',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

	public function sort(){
		$bulan = $this->input->post("bulan");
		if ($bulan==13) {
			$data['pesan'] = $this->MO_transaksi->tampil_pesan();
			$this->load->view('element/Owner/Header_owner');
			$this->load->view('Owner_view/VO_laporan',$data);
			$this->load->view('element/Owner/Footer_owner');
		}else{
			$data['pesan'] = $this->MO_transaksi->sorting($bulan);
			$this->load->view('element/Owner/Header_owner');
			$this->load->view('Owner_view/VO_laporan',$data);
			$this->load->view('element/Owner/Footer_owner');
		}

		// $data['total'] = $this->MO_transaksi->totalPemasukan();
		// $data['keranjang'] = $this->db->query("SELECT * FROM pesan JOIN keranjang ON pesan.id_pesan=keranjang.pesan_id_pesan")->num_rows();
		
	}
} 
?>