<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MA_bukti extends CI_Model {

    function tampil_bukti(){
      $query = $this->db->query("SELECT * FROM bayar");
      return $query->result();
    }
    function hapus_bukti($idbukti){
      $query = $this->db->query("DELETE FROM `bayar` WHERE id_bayar='$idbukti'");
    }
}
?>