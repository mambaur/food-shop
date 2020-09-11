<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_kategori');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['kategori'] = $this->MA_kategori->tampil_kategori();
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-kategori',$data);
		$this->load->view('element/owner/owner-footer');
	}
	public function tambah_kategori(){
		$idkate = $this->MA_kategori->get_idkategori();
		$nama_kate=$this->input->post('nama_kategori');
		$cek = $this->db->query("SELECT * FROM kategori WHERE nama_kategori='$nama_kate'")->num_rows();
		if ($cek >= 1){
			echo "<script>
                alert('Nama kategori sudah ada');
                window.location.href = '".base_url('owner/kategori')."';
            </script>";//Url tujuan
		}elseif ($cek == 0) {
			$this->MA_kategori->tambah_kategori($idkate,$nama_kate);
			echo "<script>
                alert('Kategori berhasil ditambahkan');
                window.location.href = '".base_url('owner/kategori')."';
            </script>";//Url tujuan
		}
		redirect('owner/kategori');
	}

	function hapus_kategori(){
		$id_kategori= $this->uri->segment(4);
		$this->MA_kategori->hapus_kate($id_kategori);
		redirect('owner/kategori');
	}
} 
?>