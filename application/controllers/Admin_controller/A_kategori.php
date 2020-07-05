<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_kategori extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_kategori');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['kategori'] = $this->MA_kategori->tampil_kategori();
		$this->load->view('element/Admin/Header_admin');
		$this->load->view('Admin_view/VA_kategori',$data);
		$this->load->view('element/Admin/Footer_admin');
	}
	public function tambah_kategori(){
		$idkate = $this->MA_kategori->get_idkategori();
		$nama_kate=$this->input->post('nama_kategori');
		$cek = $this->db->query("SELECT * FROM kategori WHERE nama_kategori='$nama_kate'")->num_rows();
		if ($cek >= 1){
			echo "<script>
                alert('Nama kategori sudah ada');
                window.location.href = '".base_url('Admin_controller/A_kategori')."';
            </script>";//Url tujuan
		}elseif ($cek == 0) {
			$this->MA_kategori->tambah_kategori($idkate,$nama_kate);
			echo "<script>
                alert('Kategori berhasil ditambahkan');
                window.location.href = '".base_url('Admin_controller/A_kategori')."';
            </script>";//Url tujuan
		}
		redirect('Admin_controller/A_kategori');
	}

	function hapus_kategori(){
		$id_kategori= $this->uri->segment(4);
		$this->MA_kategori->hapus_kate($id_kategori);
		redirect('Admin_controller/A_kategori');
	}
} 
?>