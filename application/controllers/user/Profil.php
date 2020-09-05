<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_profil');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('login')."';
            </script>";//Url tujuan
		}
 
	}
	public function index(){
		$iduser = $this->session->userdata("iduser");
		$data['user'] = $this->M_profil->user($iduser);
		$this->load->view('element/header');
		$this->load->view('user/user-profil',$data);
		$this->load->view('element/footer');
	}
	public function updateuser(){
		$iduser = $this->session->userdata("iduser");
		$level = $this->session->userdata("level");
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$kodepos = $this->input->post('kodepos');
		$this->M_profil->update_user($iduser,$nama,$email,$pass,$telp,$alamat,$kodepos,$level);
		echo "<script>
                alert('Data anda berhasil diperbarui');
                window.location.href = '".base_url('user/profil')."';
            </script>";//Url tujuan
	}
	
}
?>