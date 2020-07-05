<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') == "login"){
			redirect('Welcome','refresh');
		}
	}
 
	public function index(){
		// $data['user'] = $this->M_login->datauser();
		$this->load->view('V_login');
		$this->load->view('element/Footer');
	}
	// 'password' => md5($password),
 
	function aksi_login(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		foreach($this->M_login->iduser($username) as $row){
			$iduser=$row->id_user;
			$namauser = $row->nama_user;
			$level=$row->level_id_level;
		}
		$where = array(
			'email' => $username,
			'password' => $password
			);
		$cek = $this->M_login->cek_login("user",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'email' => $username,
				'iduser' => $iduser,
				'namauser' => $namauser,
				'level' =>$level,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('Welcome');
 
		}else{
			echo "<script>
                alert('Username dan password salah');
                window.location.href = '".base_url('Login')."';
            </script>";//Url tujuan
		}
	}
 
	// function logout(){
	// 	$this->session->sess_destroy();
	// 	redirect(base_url('Login'));
	// }

	public function daftar(){
		$iduser = $this->M_login->get_iduser();
		$nama = $this->input->post('nama');
		$telp = $this->input->post('telp');
		$pass = $this->input->post('password');
		$username = $this->input->post('email');
		$level = 111;
		$cek = $this->db->query("SELECT * FROM user WHERE email='$username'")->num_rows();
		if ($cek >= 1){
			echo "<script>
                alert('Mohon maaf, email sudah digunakan!');
                window.location.href = '".base_url('Login')."';
            </script>";//Url tujuan
		}elseif ($cek == 0) {
			$this->M_login->tambah_user($iduser,$nama,$pass,$username,$level,$telp);
			foreach($this->M_login->iduser($username) as $row){
				$namauser = $row->nama_user;
			}
			$data_session = array(
				'email' => $username,
				'iduser' => $iduser,
				'namauser' => $namauser,
				'level' =>$level,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			echo "<script>
                alert('Register berhasil, selamat datang ".$this->session->userdata("namauser")." !');
                window.location.href = '".base_url('Welcome')."';
            </script>";//Url tujuan
		}
	}
	
}
?>