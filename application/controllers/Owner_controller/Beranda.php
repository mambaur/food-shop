<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{
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
		$data['order'] = $this->db->query("SELECT * FROM pesan")->num_rows();
		$data['user'] = $this->db->query("SELECT * FROM user WHERE level_id_level='111'")->num_rows();
		$data['kontak'] = $this->db->query("SELECT * FROM tentang")->num_rows();
		$data['pesan'] = $this->MO_transaksi->tampil_pesan();
		$this->load->view('element/Owner/Header_owner',$data);
		$this->load->view('Owner_view/VO_beranda',$data);
		$this->load->view('element/Owner/Footer_owner');
	}
	public function cari(){
		$kodepesan=$this->input->post('cari');
		$cek=$this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim JOIN user ON pesan.user_id_user=user.id_user WHERE id_pesan='$kodepesan' ORDER BY id_pesan DESC")->num_rows();
		if ($cek>=1) {
			$data['total'] = $this->MO_transaksi->totalPemasukan();
			$data['order'] = $this->db->query("SELECT * FROM pesan")->num_rows();
			$data['user'] = $this->db->query("SELECT * FROM user WHERE level_id_level='111'")->num_rows();
			$data['kontak'] = $this->db->query("SELECT * FROM tentang")->num_rows();
			$data['pesan'] = $this->MO_transaksi->tampil_pesanid($kodepesan);
			$this->load->view('element/Owner/Header_owner',$data);
			$this->load->view('Owner_view/VO_beranda',$data);
			$this->load->view('element/Owner/Footer_owner');
		}else{
			echo "<script>
                alert('Kode pesan tidak ditemukan!');
                window.location.href = '".base_url('Owner_controller/Beranda')."';
            </script>";//Url tujuan
		}

	}

	public function datapengiriman(){
		$idkirim = $this->uri->segment(4);
		$data['kirim'] = $this->MO_transaksi->tampil_pengiriman($idkirim);
		$this->load->view('Owner_view/VO_datapengiriman',$data);
	}


	public function status(){
		$idpesan = $this->uri->segment(4);
		$status = 'Terbayar';
		$this->MO_transaksi->updatestatus($idpesan,$status);
		redirect('Owner_controller/Beranda');
	}

	public function detail_transaksi(){
		$data['status'] = $this->input->post("status");
		$iduser = $this->input->post("iduser");
		$data['kodepos'] = $this->input->post("kode_pos");
		$data['idpesan'] = $this->input->post('idpesan');
		$idpesan2 =$this->input->post('idpesan');
		$data['inv'] = $this->MO_transaksi->invoice($idpesan2,$iduser);
		$data['inv2'] = $this->MO_transaksi->user($iduser);
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
                window.location.href = '".base_url('Owner_controller/O_produk')."';
            </script>";
		}else{
			echo "<script>
                alert('Id produk tidak ditemukan!');
                window.location.href = '".base_url('Owner_controller/O_produk')."';
            </script>";
		}
	}
} 
?>