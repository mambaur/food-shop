<?php 
 
class Profil_model extends CI_Model{
	function user($iduser){
		$query = $this->db->query("SELECT * FROM user WHERE id_user='$iduser'");
		return $query->result();
	}
	function update_user($iduser,$nama,$email,$pass,$telp,$alamat,$kodepos,$level){
		$query = $this->db->query("UPDATE `user` SET `password`='$pass',`nama_user`='$nama',`no_telp`='$telp',`alamat`='$alamat',`kode_pos`='$kodepos',`email`='$email',`level_id_level`='$level' WHERE id_user='$iduser'");
	}
}
?>
