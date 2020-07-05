<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_contact');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		$this->load->view('element/Header');
		$this->load->view('V_contact');
		$this->load->view('element/Footer');
	}
	public function tambah_contact(){
		$nama=$this->session->userdata("namauser");;
		$email=$this->session->userdata("email");;
		$judul=$this->input->post('judul');
		$pesan=$this->input->post('pesan');
		$tgl=date('Y-m-d');
		$this->M_contact->insert_contact($nama,$email,$judul,$pesan,$tgl);
		$cek = $this->db->query("SELECT * FROM tentang WHERE nama_tentang='$nama' AND judul_tentang='$judul' AND isi_pesan='$pesan'")->num_rows();
		if ($cek >= 1){
			echo "<script>
                alert('Pesan telah terkirim');
                window.location.href = '".base_url('Contact')."';
            </script>";//Url tujuan
		}elseif ($cek == 0) {
			echo "<script>
                alert('pesan gagal terkirim');
                window.location.href = '".base_url('Contact')."';
            </script>";//Url tujuan
		}
		redirect('Contact');
	}
}
?>