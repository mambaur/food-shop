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
                window.location.href = '".base_url('admin/login')."';
            </script>";
		}
	}

	public function index(){
		$data['total'] = $this->MA_transaksi->totalPemasukan();
		$data['order'] = $this->db->get('pesan')->num_rows();
		$data['user'] = $this->db->get_where('user', ['level_id_level' => 111])->num_rows();
		$data['kontak'] = $this->db->get('tentang')->num_rows();
		$data['pesan'] = $this->MA_transaksi->tampil_pesan();
		$this->load->view('element/admin/admin-header',$data);
		$this->load->view('admin/admin-beranda',$data);
		$this->load->view('element/admin/admin-footer');
	}
	public function cari(){
		$kodepesan=$this->input->post('cari');

		$this->db->join('pengiriman', 'pesan.pengiriman_id_kirim=pengiriman.id_kirim');
		$this->db->join('user', 'pesan.user_id_user=user.id_user');
		$this->db->where('id_pesan', $kodepesan);
		$this->db->order_by('id_pesan', 'DESC');
		$cek = $this->db->get('pesan')->num_rows();
		if ($cek>=1) {
			$data['total'] = $this->MA_transaksi->totalPemasukan();
			$data['order'] = $this->db->get("pesan")->num_rows();
			$data['user'] = $this->db->get_where("user",  ['level_id_level' => '111'])->num_rows();
			$data['kontak'] = $this->db->get("tentang")->num_rows();
			$data['pesan'] = $this->MA_transaksi->tampil_pesanid($kodepesan);
			$this->load->view('element/admin/admin-header',$data);
			$this->load->view('admin/admin-beranda',$data);
			$this->load->view('element/admin/admin-footer');
		}else{
			echo "<script>
                alert('Kode pesan tidak ditemukan!');
                window.location.href = '".base_url('admin/beranda')."';
            </script>";
		}

	}

	public function pengiriman(){
		$idkirim = $this->uri->segment(4);
		$data['kirim'] = $this->MA_transaksi->tampil_pengiriman($idkirim);
		$this->load->view('admin/admin-pengiriman',$data);
	}


	public function status(){
		$idpesan = $this->uri->segment(4);
		$status = 'Terbayar';
		$this->MA_transaksi->updatestatus($idpesan,$status);
		redirect('admin/beranda');
	}

	public function detail(){
		$data['status'] = $this->input->post("status");
		$iduser = $this->input->post("iduser");
		$data['kodepos'] = $this->input->post("kode_pos");
		$data['idpesan'] =$this->input->post('idpesan');
		$idpesan2 =$this->input->post('idpesan');
		$data['inv'] = $this->MA_transaksi->invoice($idpesan2,$iduser);
		$data['inv2'] = $this->MA_transaksi->user($iduser);
		$data['pengiriman'] = $this->input->post('harga_kirim');
		$data['total2'] = $this->input->post('total_pesan');
		$this->load->view('user/user-invoice',$data);
	}
} 
?>