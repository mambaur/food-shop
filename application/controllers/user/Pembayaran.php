<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Bukti_model');
		$this->load->library('upload');
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('login')."';
            </script>";
		}
	} 

	function index(){
		$data['gambar'] = $this->Bukti_model->tampil_gambar();
		$this->load->view('element/header');
		$this->load->view('user/user-pembayaran',$data);
		$this->load->view('element/footer');
	}

	function insert(){
		$config['upload_path'] = './assets/images/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){

	        if ($this->upload->do_upload('filefoto')){
	            $gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '50%';
	            $config['width']= 600;
	            $config['height']= 400;
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $id = $this->Bukti_model->get_idbayar();
	            $nama_pemilik=$this->input->post('nama');
	            $bank=$this->input->post('bank');
	            $kode=$this->input->post('kode_pesan');
	            $gambar='assets/images/'.$gbr['file_name'];
				$this->Bukti_model->simpan_upload($id,$nama_pemilik,$bank,$gambar,$kode);
				echo "<script>
	                alert('Upload berhasil');
	                window.location.href = '".base_url('user/pembayaran')."';
	            </script>";
			}
	                 
	    }else{
			echo "<script>
	                alert('Upload gagal');
	                window.location.href = '".base_url('user/pembayaran')."';
	            </script>";
		}		
	}
} 
?>