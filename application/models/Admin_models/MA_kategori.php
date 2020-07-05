<?php 
class MA_kategori extends CI_Model{
	function tambah_kategori($idkate,$nama_kate){
		$query = $this->db->query("INSERT INTO `kategori`(`id_kategori`, `nama_kategori`) VALUES ('$idkate','$nama_kate')");
	}
	function get_idkategori(){
          $this->db->select('RIGHT(kategori.id_kategori,4) as kode', FALSE);
		  $this->db->order_by('id_kategori','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('kategori');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "KG".$kodemax;  
		  return $kodejadi;
	}
	function tampil_kategori(){
		$query = $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC");
		return $query->result();
	}
	function hapus_kate($id_kategori){
		$query = $this->db->query("DELETE FROM `kategori` WHERE id_kategori='$id_kategori'");
	}
}
?>