<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AD_home extends CI_Model {

    function tampil_produk(){
      $query = $this->db->query("SELECT * FROM produk JOIN kategori ON produk.kategori_id_kategori=kategori.id_kategori");
      return $query->result();
    }
    function tampil_produkid($id_produk){
      $query = $this->db->query("SELECT * FROM produk JOIN kategori ON produk.kategori_id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
      return $query->result();
    }
    
    function tampil_kategori(){
      $query = $this->db->query("SELECT * FROM kategori");
      return $query->result();
    }
    
    function tampil_kategoriid($id_kategori){
      $query = $this->db->query("SELECT * FROM produk JOIN kategori ON produk.kategori_id_kategori=kategori.id_kategori WHERE id_kategori='$id_kategori'");
      return $query->result();
    }
    
    function tampil_user(){
      $query = $this->db->query("SELECT * FROM user JOIN level ON user.level_id_level=level.id_level");
      return $query->result();
    }
    function tampil_userid($id_user,$id_level){
      $query = $this->db->query("SELECT * FROM user JOIN level ON user.level_id_level=level.id_level WHERE id_user='$id_user' AND id_level='$id_level'");
      return $query->result();
    }
    function tampil_bukti(){
      $query = $this->db->query("SELECT * FROM bayar");
      return $query->result();
    }
    function tampil_buktiid($id_bukti){
      $query = $this->db->query("SELECT * FROM bayar WHERE id_bayar='$id_bukti'");
      return $query->result();
    }
    
    function tampil_tentang(){
      $query = $this->db->query("SELECT * FROM tentang");
      return $query->result();
    }
    function tampil_tentangid($id_tentang){
      $query = $this->db->query("SELECT * FROM tentang WHERE id_tentang='$id_tentang'");
      return $query->result();
    }
}
?>