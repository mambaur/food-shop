<?php 
 
class Pesanan_model extends CI_Model{
	
	function tampil_barang($idpesan,$iduser){
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON keranjang.produk_id_produk=produk.id_produk WHERE pesan_id_pesan='$idpesan' AND user_id_user='$iduser'");
		return $query->result();
	}
	function stok($idpesan2,$iduser){
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON keranjang.produk_id_produk=produk.id_produk WHERE pesan_id_pesan='$idpesan2' AND user_id_user='$iduser'");
		return $query->result();
	}
	function subtotal($idpesan,$iduser){
		$query = $this->db->query("SELECT SUM(total) AS subtotal FROM keranjang WHERE pesan_id_pesan='$idpesan' AND user_id_user='$iduser'");
		return $query->result();
	}

	function insert_keranjang($jumlah,$total,$id,$user,$idpesan){
		$query = $this->db->query("INSERT INTO `keranjang`(`jumlah`, `total`, `produk_id_produk`, `user_id_user`, `pesan_id_pesan`) VALUES ('$jumlah','$total','$id','$user','$idpesan')");
	}
	function input_pesan($idpesan,$tgl,$status,$iduser,$kirim,$total_pesan,$jatuh_tempo){
		$query = $this->db->query("INSERT INTO `pesan`(`id_pesan`, `tanggal_pesan`, `jatuh_tempo`, `status`, `user_id_user`, `pengiriman_id_kirim`, `total_pesan`) VALUES ('$idpesan','$tgl','$jatuh_tempo','$status','$iduser','$kirim','$total_pesan')");
	}
	function tampil_pesan(){
		$query = $this->db->query("SELECT * FROM pesan JOIN user ON user.id_user=pesan.user_id_user JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim");
		return $query->result();
	}
	
	function get_idkirim(){
          $this->db->select('RIGHT(pengiriman.id_kirim,4) as kode', FALSE);
		  $this->db->order_by('id_kirim','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pengiriman');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "S0".$kodemax;  
		  return $kodejadi;
	}
	function insert_kirim($kirim,$provinsi,$kota,$layanan,$harga_kirim,$kurir,$namapengirim,$kecamatan,$desa,$kodepos,$telp){
		$query = $this->db->query("INSERT INTO `pengiriman`(`id_kirim`, `nama_pengirim`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `jenis_layanan`, `kurir`, `harga_kirim`, `kodepos`, `telp`) VALUES ('$kirim','$namapengirim','$provinsi','$kota','$kecamatan','$desa','$layanan','$kurir','$harga_kirim','$kodepos','$telp')");
	}

	function hapus_keranjang($id,$idpesan){
		$query = $this->db->query("DELETE FROM `keranjang` WHERE produk_id_produk='$id' AND pesan_id_pesan='$idpesan'");
	}
	function invoice($idpesan2,$iduser){
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan JOIN user ON keranjang.user_id_user=user.id_user WHERE pesan_id_pesan='$idpesan2' AND keranjang.user_id_user='$iduser'");
		return $query->result();
	}
	function invoice2($id,$idpesan2,$iduser){
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan JOIN user ON keranjang.user_id_user=user.id_user WHERE pesan_id_pesan='$idpesan2' AND produk_id_produk='$id' AND keranjang.user_id_user='$iduser'");
		return $query->result();
	}

		// function skedul($idpesan2){
		// 	$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.keranjang_id_keranjang WHERE pesan_id_pesan='$idpesan2'");
		// 	return $query->result();
		// }

	public function tambah_detail_keranjang($data_detail)
	{
		$this->db->insert('keranjang', $data_detail);
	}

}
?>