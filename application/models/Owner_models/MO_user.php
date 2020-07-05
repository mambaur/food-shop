<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MO_user extends CI_Model {

    function tampil_user(){
      $query = $this->db->query("SELECT * FROM user WHERE level_id_level='222'");
      return $query->result();
    }
    function tampil($iduser){
      $query = $this->db->query("SELECT * FROM user WHERE id_user='$iduser'");
      return $query->result();
    }
    function hapus_user($id_user){
		$query = $this->db->query("DELETE FROM `user` WHERE id_user='$id_user'");
	}
	function get_idpegawai(){
          $this->db->select('RIGHT(user.id_user,4) as kode', FALSE);
		  $this->db->order_by('id_user','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('user');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "10".$kodemax;  
		  return $kodejadi;
	}
	function insert_peg($idpeg,$nama,$email,$telp,$password,$alamat,$kodepos,$level){
		$query = $this->db->query("INSERT INTO `user`(`id_user`, `password`, `nama_user`, `no_telp`, `alamat`, `kode_pos`, `email`, `level_id_level`) VALUES ('$idpeg','$password','$nama','$telp','$alamat','$kodepos','$email','$level')");
	}
	function update_peg($idpeg,$nama,$email,$telp,$password,$alamat,$kodepos,$level){
		$query = $this->db->query("UPDATE `user` SET `password`='$password',`nama_user`='$nama',`no_telp`='$telp',`alamat`='$alamat',`kode_pos`='$kodepos',`email`='$email' WHERE id_user='$idpeg'");
	}
   
}
?>