<?php 
 
class Keranjang_model extends CI_Model{
	
	function tampil_barang($idpesan,$user){
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON keranjang.produk_id_produk=produk.id_produk WHERE pesan_id_pesan='$idpesan' AND user_id_user='$user'");
		return $query->result();
	}

	function total_berat($idpesan,$user){
		$query = $this->db->query("SELECT SUM(berat_total) AS tberat FROM keranjang WHERE pesan_id_pesan='$idpesan' AND user_id_user='$user'");
		return $query->result();
	}

	function get_idpesan(){
          $this->db->select('RIGHT(pesan.id_pesan,4) as kode', FALSE);
		  $this->db->order_by('id_pesan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pesan');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "PS".$kodemax;  
		  return $kodejadi;
	}

	function hapus_keranjang($id,$idpesan){
		$query = $this->db->query("DELETE FROM `keranjang` WHERE produk_id_produk='$id' AND pesan_id_pesan='$idpesan'");
	}
	
	function update_keranjang($id,$idpesan,$user,$jumlah,$total){
		$query = $this->db->query("UPDATE `keranjang` SET `jumlah`='$jumlah', `total`='$total' WHERE produk_id_produk='$id' AND user_id_user='$user' AND pesan_id_pesan='$idpesan'");
	}
}
?>