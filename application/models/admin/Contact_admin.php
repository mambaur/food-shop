<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_admin extends CI_Model {

    function tampil_contact(){
      $query = $this->db->query("SELECT * FROM tentang ORDER BY id_tentang DESC");
      return $query->result();
    }
    function delete($idtentang){
      $query = $this->db->query("DELETE FROM `tentang` WHERE id_tentang='$idtentang'");
    }
}
?>