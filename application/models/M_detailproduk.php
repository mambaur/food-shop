<?php 
 
class M_detailproduk extends CI_Model{
	function tampil_kategori(){
		return $this->db->get('kategori')->result();
	}
	function tampil_produk($id){
		$query = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
		return $query->result();
	}
}
?>