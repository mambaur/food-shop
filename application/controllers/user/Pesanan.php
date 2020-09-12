<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Pesanan_model');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Login')."';
            </script>";
		}
	}

	public function index(){
		redirect('user/keranjang');
	}

	public function data(){
		$kurir = $this->input->post('kurir');

		$iduser = $this->session->userdata("iduser");
		foreach ($this->cart->contents() as $item) {
			$idpesan=$item['idpesan'];
		}

		if ($cart = $this->cart->contents()){
			$data['idpesan'] = $idpesan;
			$data['pengiriman'] = $this->input->post('harga'); 
			$data['kurir'] = $this->input->post('kurir');
			$data['provinsi'] = $this->input->post('provinsi');
			$data['kota'] = $this->input->post('kota');
			$data['namapengirim'] = $this->input->post('namapengirim');
			$data['kecamatan'] = $this->input->post('kecamatan');
			$data['desa'] = $this->input->post('desa');
			$data['kodepos'] = $this->input->post('kodepos');
			$data['layanan'] = $this->input->post('layanan');
			$data['telp'] = $this->input->post('telp');
			$this->load->view('element/header');
			$this->load->view('user/user-pesanan',$data);
			$this->load->view('element/footer');
		}else{
			echo "<script>
                alert('Mohon pilih produk terlebih dahulu');
                window.location.href = '".base_url('user/keranjang')."';
            </script>";
		}
		
	}
	
	public function insert_pesan(){
		$iduser = $this->session->userdata("iduser");
		foreach ($this->cart->contents() as $item) {
			$idpesan=$item['idpesan'];
		}

		date_default_timezone_set('Asia/Jakarta');
		$tgl=date('Y-m-d H:i:s');
		$jatuh_tempo=date('Y-m-d H:i:s',strtotime('+5 hours'));
		$status = 'Proses';
		$total_pesan = $this->input->post('total_pesan');
		$kirim = $this->Pesanan_model->get_idkirim();
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$namapengirim = $this->input->post('namapengirim');
		$kecamatan = $this->input->post('kecamatan');
		$desa = $this->input->post('desa');
		$kodepos = $this->input->post('kodepos');
		$layanan = $this->input->post('layanan');
		$harga_kirim = $this->input->post('harga_kirim');
		$kurir = $this->input->post('kurir');
		$telp = $this->input->post('telp');
		foreach ($this->cart->contents() as $a) {
			if ($a['qty'] > $a['stok']) {
				echo "<script>
                alert('Jumlah produk melebihi stok yang tersedia silahkan kurangi jumlah produk yang dibeli');
                window.location.href = '".base_url('user/keranjang')."';
            </script>";
			}else {
				$id=$a['id'];
				$qty=$a['qty'];
				$this->db->query("UPDATE `produk` SET `stok`=stok-'$qty' WHERE id_produk='$id'");
			}
		}
		$this->Pesanan_model->insert_kirim($kirim,$provinsi,$kota,$layanan,$harga_kirim,$kurir,$namapengirim,$kecamatan,$desa,$kodepos,$telp);

		$this->Pesanan_model->input_pesan($idpesan,$tgl,$status,$iduser,$kirim,$total_pesan,$jatuh_tempo);

		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $a)
					{
						$data_detail = array('jumlah' =>$a['qty'],
										'total' => $a['subtotal'],
										'produk_id_produk' => $a['id'],
										'user_id_user' => $iduser,
										'pesan_id_pesan' => $idpesan,
										'berat_total' => $a['berat']*$a['qty']);
						$this->Pesanan_model->tambah_detail_keranjang($data_detail);
						
					}
			}
			$this->cart->destroy();

		echo "<script>
                alert('Pemesanan produk berhasil, lakukan pembayaran selama 5 jam kedepan!');
                window.location.href = '".base_url('user/transaksi')."';
            </script>";
	}
}
?>