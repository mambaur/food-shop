<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_contact extends CI_Model {

    function insert_contact($nama,$email,$judul,$pesan,$tgl){
        $query = $this->db->query("INSERT INTO `tentang`(`id_tentang`, `nama_tentang`, `judul_tentang`, `email_tentang`, `isi_pesan`, `tanggal`) VALUES ('','$nama','$judul','$email','$pesan','$tgl')");
    }
}
?>