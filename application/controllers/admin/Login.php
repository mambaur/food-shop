<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Login_model');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') == "222"){
			redirect('admin/beranda','refresh');
		}else if ($this->session->userdata('owner') == "333") {
			redirect('owner/beranda','refresh');
		}
 
	}

	function index(){
		$this->load->view('admin/admin-login');
	}

	function aksi_login(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		foreach($this->Login_model->iduser($username) as $row){
			$iduser=$row->id_user;
			$namauser = $row->nama_user;
			$level = $row->level_id_level;
		}
		$where = array(
			'email' => $username,
			'password' => $password,
			'level_id_level' => 222
			);
		$where2 = array(
			'email' => $username,
			'password' => $password,
			'level_id_level' => 333
			);
		$cek = $this->Login_model->cek_login("user",$where)->num_rows();
		$cek2 = $this->Login_model->cek_login2("user",$where2)->num_rows();
		if($cek > 0){
			$data_session = array(
				'emailadmin' => $username,
				'iduseradmin' => $iduser,
				'namaadmin' => $namauser,
				'admin' => $level,
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('admin/beranda');
 
		}else if ($cek2 > 0) {
			$data_session = array(
				'emailowner' => $username,
				'iduserowner' => $iduser,
				'namaowner' => $namauser,
				'owner' => $level,
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('owner/beranda');
		}else{
			echo "<script>
                alert('Mohon periksa kembali username atau password anda');
                window.location.href = '".base_url('admin/login')."';
            </script>";
		}
	}
} 
?>