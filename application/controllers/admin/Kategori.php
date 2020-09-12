<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/Kategori_admin');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";
		}
	}

	function index(){
		$data['kategori'] = $this->Kategori_admin->tampil_kategori();
		$this->load->view('element/admin/admin-header');
		$this->load->view('admin/admin-kategori',$data);
		$this->load->view('element/admin/admin-footer');
	}
	public function tambah_kategori(){
		$idkate = $this->Kategori_admin->get_idkategori();
		$nama_kate=$this->input->post('nama_kategori');
		$cek = $this->db->query("SELECT * FROM kategori WHERE nama_kategori='$nama_kate'")->num_rows();
		if ($cek >= 1){
			echo "<script>
                alert('Nama kategori sudah ada');
                window.location.href = '".base_url('admin/kategori')."';
            </script>";
		}elseif ($cek == 0) {
			$this->Kategori_admin->tambah_kategori($idkate,$nama_kate);
			echo "<script>
                alert('Kategori berhasil ditambahkan');
                window.location.href = '".base_url('admin/kategori')."';
            </script>";
		}
		redirect('admin/kategori');
	}

	function hapus_kategori(){
		$id_kategori= $this->uri->segment(4);
		$this->Kategori_admin->hapus_kate($id_kategori);
		redirect('admin/kategori');
	}
} 
?>