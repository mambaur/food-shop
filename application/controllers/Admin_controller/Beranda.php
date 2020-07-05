<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_transaksi');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		$data['total'] = $this->MA_transaksi->totalPemasukan();
		$data['order'] = $this->db->query("SELECT * FROM pesan")->num_rows();
		$data['user'] = $this->db->query("SELECT * FROM user WHERE level_id_level='111'")->num_rows();
		$data['kontak'] = $this->db->query("SELECT * FROM tentang")->num_rows();
		$data['pesan'] = $this->MA_transaksi->tampil_pesan();
		$this->load->view('element/Admin/Header_admin',$data);
		$this->load->view('Admin_view/VA_beranda',$data);
		$this->load->view('element/Admin/Footer_admin');
	}
	public function cari(){
		$kodepesan=$this->input->post('cari');
		$cek=$this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim JOIN user ON pesan.user_id_user=user.id_user WHERE id_pesan='$kodepesan' ORDER BY id_pesan DESC")->num_rows();
		if ($cek>=1) {
			$data['total'] = $this->MA_transaksi->totalPemasukan();
			$data['order'] = $this->db->query("SELECT * FROM pesan")->num_rows();
			$data['user'] = $this->db->query("SELECT * FROM user WHERE level_id_level='111'")->num_rows();
			$data['kontak'] = $this->db->query("SELECT * FROM tentang")->num_rows();
			$data['pesan'] = $this->MA_transaksi->tampil_pesanid($kodepesan);
			$this->load->view('element/Admin/Header_admin',$data);
			$this->load->view('Admin_view/VA_beranda',$data);
			$this->load->view('element/Admin/Footer_admin');
		}else{
			echo "<script>
                alert('Kode pesan tidak ditemukan!');
                window.location.href = '".base_url('Admin_controller/Beranda')."';
            </script>";//Url tujuan
		}

	}

	public function datapengiriman(){
		$idkirim = $this->uri->segment(4);
		$data['kirim'] = $this->MA_transaksi->tampil_pengiriman($idkirim);
		$this->load->view('Admin_view/VA_datapengiriman',$data);
	}


	public function status(){
		$idpesan = $this->uri->segment(4);
		$status = 'Terbayar';
		$this->MA_transaksi->updatestatus($idpesan,$status);
		redirect('Admin_controller/Beranda');
	}

	public function detail_transaksi(){
		$data['status'] = $this->input->post("status");
		$iduser = $this->input->post("iduser");
		$data['kodepos'] = $this->input->post("kode_pos");
		$data['idpesan'] =$this->input->post('idpesan');
		$idpesan2 =$this->input->post('idpesan');
		$data['inv'] = $this->MA_transaksi->invoice($idpesan2,$iduser);
		$data['inv2'] = $this->MA_transaksi->user($iduser);
		$data['pengiriman'] = $this->input->post('harga_kirim');
		$data['total2'] = $this->input->post('total_pesan');
		$this->load->view('V_invoice',$data);
	}

	public function tambahstok(){
		$id_produk = $this->input->post('id_produk');
		$tambahstok = $this->input->post('tambahstok');

		$cek = $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'")->num_rows();
		if ($cek>=1) {
			$this->db->query("UPDATE `produk` SET `stok`=stok+'$tambahstok' WHERE id_produk='$id_produk'");
			echo "<script>
                alert('Stok berhasil ditambahkan');
                window.location.href = '".base_url('Produk')."';
            </script>";
		}else{
			echo "<script>
                alert('Id produk tidak ditemukan!');
                window.location.href = '".base_url('Produk')."';
            </script>";
		}
	}
} 
?>