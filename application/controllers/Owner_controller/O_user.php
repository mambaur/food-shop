<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class O_user extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Owner_models/MO_user');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['user'] = $this->MO_user->tampil_user();
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/VO_user',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

	function tambahuser(){
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/VO_tambahuser');
		$this->load->view('element/Owner/Footer_owner');
	}
	function insertpegawai(){
		$email = $this->input->post('email');
		$cek = $cek = $this->db->query("SELECT * FROM user WHERE email='$email'")->num_rows();
		if ($cek>=1) {
			echo "<script>
                alert('User sudah digunakan');
                window.location.href = '".base_url('Owner_controller/O_user')."';
            </script>";//Url tujuan
		}else {
			$idpeg = $this->MO_user->get_idpegawai();
			$nama = $this->input->post('nama');
			$telp = $this->input->post('telp');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$kodepos = $this->input->post('kodepos');
			$level = 222;
			$this->MO_user->insert_peg($idpeg,$nama,$email,$telp,$password,$alamat,$kodepos,$level);
			echo "<script>
                alert('Tambah pegawai berhasil');
                window.location.href = '".base_url('Owner_controller/O_user')."';
            </script>";//Url tujuan
		}
	}
	function edituser(){
		$iduser = $this->uri->segment(4);
		$data['user'] = $this->MO_user->tampil($iduser);
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/VO_edituser',$data);
		$this->load->view('element/Owner/Footer_owner');
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
			$this->MO_user->update_peg($idpeg,$nama,$email,$telp,$password,$alamat,$kodepos,$level);
			echo "<script>
                alert('Edit pegawai berhasil');
                window.location.href = '".base_url('Owner_controller/O_user')."';
            </script>";//Url tujuan

	}

	function hapus_user(){
		$id_user= $this->uri->segment(4);
		$this->MO_user->hapus_user($id_user);
		redirect('Owner_controller/O_user');
	}
} 
?>