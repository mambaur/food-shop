<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('owner/Transaksi_owner');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		$data['total'] = $this->Transaksi_owner->totalPemasukan();
		$data['order'] = $this->db->get("pesan")->num_rows();
		$data['user'] = $this->db->get_where("user", ['level_id_level' => '111'])->num_rows();
		$data['kontak'] = $this->db->get("tentang")->num_rows();
		$data['pesan'] = $this->Transaksi_owner->tampil_pesan();
		$this->load->view('element/owner/owner-header',$data);
		$this->load->view('owner/owner-beranda',$data);
		$this->load->view('element/owner/owner-footer');
	}
	public function cari(){
		$kodepesan=$this->input->post('cari');
		$cek=$this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim JOIN user ON pesan.user_id_user=user.id_user WHERE id_pesan='$kodepesan' ORDER BY id_pesan DESC")->num_rows();
		if ($cek>=1) {
			$data['total'] = $this->Transaksi_owner->totalPemasukan();
			$data['order'] = $this->db->query("SELECT * FROM pesan")->num_rows();
			$data['user'] = $this->db->query("SELECT * FROM user WHERE level_id_level='111'")->num_rows();
			$data['kontak'] = $this->db->query("SELECT * FROM tentang")->num_rows();
			$data['pesan'] = $this->Transaksi_owner->tampil_pesanid($kodepesan);
			$this->load->view('element/owner/owner-header',$data);
			$this->load->view('owner/owner-beranda',$data);
			$this->load->view('element/owner/owner-footer');
		}else{
			echo "<script>
                alert('Kode pesan tidak ditemukan!');
                window.location.href = '".base_url('owner/beranda')."';
            </script>";//Url tujuan
		}

	}

	public function pengiriman(){
		$idkirim = $this->uri->segment(4);
		$data['kirim'] = $this->Transaksi_owner->tampil_pengiriman($idkirim);
		$this->load->view('owner/owner-pengiriman',$data);
	}


	public function status(){
		$idpesan = $this->uri->segment(4);
		$status = 'Terbayar';
		$this->Transaksi_owner->updatestatus($idpesan,$status);
		redirect('owner/beranda');
	}

	public function detail_transaksi(){
		$data['status'] = $this->input->post("status");
		$iduser = $this->input->post("iduser");
		$data['kodepos'] = $this->input->post("kode_pos");
		$data['idpesan'] = $this->input->post('idpesan');
		$idpesan2 =$this->input->post('idpesan');
		$data['inv'] = $this->Transaksi_owner->invoice($idpesan2,$iduser);
		$data['inv2'] = $this->Transaksi_owner->user($iduser);
		$data['pengiriman'] = $this->input->post('harga_kirim');
		$data['total2'] = $this->input->post('total_pesan');
		$this->load->view('user/user-invoice',$data);
	}
	public function tambahstok(){
		$id_produk = $this->input->post('id_produk');
		$tambahstok = $this->input->post('tambahstok');

		$cek = $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'")->num_rows();
		if ($cek>=1) {
			$this->db->query("UPDATE `produk` SET `stok`=stok+'$tambahstok' WHERE id_produk='$id_produk'");
			echo "<script>
                alert('Stok berhasil ditambahkan');
                window.location.href = '".base_url('owner/produk')."';
            </script>";
		}else{
			echo "<script>
                alert('Id produk tidak ditemukan!');
                window.location.href = '".base_url('owner/produk')."';
            </script>";
		}
	}
} 
?>