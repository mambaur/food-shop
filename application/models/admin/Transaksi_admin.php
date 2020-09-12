<?php 
 
class Transaksi_admin extends CI_Model{
	function tampil_pesan(){
		$query = $this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim JOIN user ON pesan.user_id_user=user.id_user ORDER BY id_pesan DESC");
		return $query->result();
	}
	function tampil_pesanid($kodepesan){
		$query = $this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim JOIN user ON pesan.user_id_user=user.id_user WHERE id_pesan='$kodepesan' ORDER BY id_pesan DESC");
		return $query->result();
	}
	function tampil_pengiriman($idkirim){
		$query = $this->db->query("SELECT * FROM pengiriman WHERE id_kirim='$idkirim'");
		return $query->result();
	}

	function totalPemasukan(){
		$query = $this->db->query("SELECT SUM(total_pesan) AS totalMasuk FROM pesan");
		return $query->result();
	}

	function updatestatus($idpesan,$status){
		$query = $this->db->query("UPDATE `pesan` SET `status`='$status' WHERE id_pesan='$idpesan'");
	}

	function user($iduser){
		$query = $this->db->query("SELECT * FROM user WHERE id_user='$iduser'");
		return $query->result();
	}

	function invoice($idpesan2,$iduser){
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan JOIN user ON keranjang.user_id_user=user.id_user WHERE pesan_id_pesan='$idpesan2' AND keranjang.user_id_user='$iduser'");
		return $query->result();
	}
}
?>