<?php 
 
class Login_model extends CI_Model{
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function cek_login2($table,$where2){		
		return $this->db->get_where($table,$where2);
	}
	function iduser($username){
		$query = $this->db->get_where("user", ['email'=>$username]);
		return $query->result();
	}
	function get_iduser(){
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
	function tambah_user($iduser,$nama,$pass,$username,$level,$telp){
		$query = $this->db->query("INSERT INTO `user`(`id_user`, `password`, `nama_user`, `no_telp`, `alamat`, `kode_pos`, `email`, `level_id_level`) VALUES ('$iduser','$pass','$nama','$telp','','','$username','$level')");
	}
}
?>
