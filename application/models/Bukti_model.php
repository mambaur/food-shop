<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bukti_model extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  function simpan_upload($id,$nama_pemilik,$bank,$gambar,$kode){
    $hasil=$this->db->query("INSERT INTO bayar(id_bayar,nama_pemilik,bank,bukti_pembayaran,kode_pesan) VALUES ('$id','$nama_pemilik','$bank','$gambar','$kode')");
    return $hasil;
  }
  function get_idbayar(){
      $this->db->select('RIGHT(bayar.id_bayar,4) as kode', FALSE);
      $this->db->order_by('id_bayar','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('bayar');     
      if($query->num_rows() <> 0){      
    
       $data = $query->row();      
       $kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
       $kode = 1;    
      }
      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
      $kodejadi = "BR".$kodemax;  
      return $kodejadi;
  }
  function tampil_gambar(){
    $query = $this->db->query("SELECT * FROM bayar");
    return $query->result();
  }
}
?>