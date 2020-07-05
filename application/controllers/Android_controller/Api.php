<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Android_models/AD_home');
		$this->load->helper(array('url'));
	} 

	function index(){
		foreach ($this->AD_home->tampil_produk() as $a) {
			$result[] = $a;
		}

		echo json_encode(array('result'=>$result));

	}
	
	function produkid(){
	    $id_produk = $this->input->post('id_produk');
		foreach ($this->AD_home->tampil_produkid($id_produk) as $a) {
			$result[] = $a;
		}

		echo json_encode(array($result));

	}
	
	function kategori(){
		foreach ($this->AD_home->tampil_kategori() as $a) {
			$result[] = array(
				"id_kategori" => $a->id_kategori,
				"nama_kategori" => $a->nama_kategori,
			);
		}

		echo json_encode(array('result'=>$result));

	}
	
	function kategoriid(){
	    $id_kategori = $this->input->post('id_kategori');
		foreach ($this->AD_home->tampil_kategoriid($id_kategori) as $a) {
			$result[] = array(
				"id_kategori" => $a->id_kategori,
				"nama_kategori" => $a->nama_kategori,
			);
		}

		echo json_encode(array('result'=>$result));

	}
	function user(){
		foreach ($this->AD_home->tampil_user() as $a) {
			$result[] = $a;
		}
		echo json_encode(array('result'=>$result));
	}
	function userid(){
	    // $id_user= $this->input->post('id_user');
	    // $id_level = $this->input->post('id_level');
	    $id_user=100001;
	    $id_level = '111';

		foreach ($this->AD_home->tampil_userid($id_user,$id_level) as $a) {
			$result[] = $a;
			$result['jumlahpesan'] =$this->db->query("SELECT * FROM user JOIN pesan ON user.id_user=pesan.user_id_user JOIN level ON user.level_id_level=level.id_level WHERE id_user='$id_user' AND id_level='$id_level'")->num_rows();
		}
		echo json_encode(array($a));
	}
	
	function bukti(){
		foreach ($this->AD_home->tampil_bukti() as $a) {
			$result[] = $a;
		}
		echo json_encode(array('result'=>$result));
		
	}
	
	function buktiid(){
	    $id_bukti=$this->input->post('id_bukti');
		foreach ($this->AD_home->tampil_buktiid($id_bukti) as $a) {
			$result[] = $a;
		}
		echo json_encode(array('result'=>$result));
	}
	
	function tentang(){
		foreach ($this->AD_home->tampil_tentang() as $a) {
			$result[] = $a;
		}
		echo json_encode(array('result'=>$result));
	}
	function tentangid(){
	    $id_tentang = $this->input->post('id_tentang');
		foreach ($this->AD_home->tampil_tentangid() as $a) {
			$result[] = $a;
		}
		echo json_encode(array('result'=>$result));
	}
} 
?>