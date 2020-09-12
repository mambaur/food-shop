<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('owner/User_owner');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['user'] = $this->User_owner->tampil_user();
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-admin',$data);
		$this->load->view('element/owner/owner-footer');
	}

	function tambahuser(){
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-tambah-admin');
		$this->load->view('element/owner/owner-footer');
	}

	function insertpegawai(){
		$email = $this->input->post('email');
		$cek = $cek = $this->db->query("SELECT * FROM user WHERE email='$email'")->num_rows();
		if ($cek>=1) {
			echo "<script>
                alert('User sudah digunakan');
                window.location.href = '".base_url('owner/admin')."';
            </script>";//Url tujuan
		}else {
			$idpeg = $this->User_owner->get_idpegawai();
			$nama = $this->input->post('nama');
			$telp = $this->input->post('telp');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$kodepos = $this->input->post('kodepos');
			$level = 222;
			$this->User_owner->insert_peg($idpeg,$nama,$email,$telp,$password,$alamat,$kodepos,$level);
			echo "<script>
                alert('Tambah pegawai berhasil');
                window.location.href = '".base_url('owner/admin')."';
            </script>";//Url tujuan
		}
	}
	function edituser(){
		$iduser = $this->uri->segment(4);
		$data['user'] = $this->User_owner->tampil($iduser);
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-edit-admin',$data);
		$this->load->view('element/owner/owner-footer');
	}
	function editpegawai(){
		$email = $this->input->post('email');
			$idpeg = $this->uri->segment(4);
			$nama = $this->input->post('nama');
			$telp = $this->input->post('telp');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$kodepos = $this->input->post('kodepos');
			$level = 222;
			$this->User_owner->update_peg($idpeg,$nama,$email,$telp,$password,$alamat,$kodepos,$level);
			echo "<script>
                alert('Edit pegawai berhasil');
                window.location.href = '".base_url('owner/admin')."';
            </script>";//Url tujuan

	}

	function hapus_user(){
		$id_user= $this->uri->segment(4);
		$this->User_owner->hapus_user($id_user);
		redirect('owner/admin');
	}
} 
?>