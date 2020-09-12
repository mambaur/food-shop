<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Contact_model');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('login')."';
            </script>";
		}
	}

	public function index(){
		$this->load->view('element/header');
		$this->load->view('user/user-contact');
		$this->load->view('element/footer');
	}
	public function tambah_contact(){
		$nama=$this->session->userdata("namauser");;
		$email=$this->session->userdata("email");;
		$judul=$this->input->post('judul');
		$pesan=$this->input->post('pesan');
		$tgl=date('Y-m-d');
		$this->Contact->insert_contact($nama,$email,$judul,$pesan,$tgl);
		$cek = $this->db->query("SELECT * FROM tentang WHERE nama_tentang='$nama' AND judul_tentang='$judul' AND isi_pesan='$pesan'")->num_rows();
		if ($cek >= 1){
			echo "<script>
                alert('Pesan telah terkirim');
                window.location.href = '".base_url('user/contact')."';
            </script>";
		}elseif ($cek == 0) {
			echo "<script>
                alert('pesan gagal terkirim');
                window.location.href = '".base_url('user/contact')."';
            </script>";
		}
		redirect('user/contact');
	}
}
?>