<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Produk_model');
		$this->load->helper(array('url'));
	}

// wget rinxzone.my.id/Cron => pasang di command cron job
	public function index(){
		date_default_timezone_set("Asia/Jakarta");
		$datenow=date('Y-m-d H:i:s');
		$cek = $this->db->query("SELECT * FROM produk JOIN keranjang ON keranjang.produk_id_produk=produk.id_produk JOIN `pesan` ON pesan.id_pesan=keranjang.pesan_id_pesan WHERE pesan.tanggal_pesan>pesan.jatuh_tempo  AND pesan.status='Proses'")->num_rows();
		if ($cek>=1) {
			foreach ($this->Produk_model->mcron($datenow) as $cron) {
				$this->db->query("UPDATE `produk` JOIN `keranjang` ON keranjang.produk_id_produk=produk.id_produk JOIN `pesan` ON pesan.id_pesan=keranjang.pesan_id_pesan SET `stok`=stok+'$cron->jumlah',`status`='Batal' WHERE '$datenow' > pesan.jatuh_tempo AND id_produk='$cron->id_produk'");
			}
			echo 'data berhasil di update';
		}else{
			echo 'Tidak ada data pesan yang melebihi jatuh tempo 5 jam';
		}
	}
}
