<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Produk_model');
		$this->load->library('upload');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";
		}
	}

	public function index(){
		$data = [
			'kategori' => $this->Produk_model->tampil_kategori(),
			'produk' => $this->Produk_model->tampil_produk()
		];
		$this->load->view('element/admin/admin-header');
		$this->load->view('admin/admin-produk',$data);
		$this->load->view('element/admin/admin-footer');
	}
	public function insert_produk(){
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

	            $idproduk = $this->Produk_model->get_idproduk();
				$nama_produk=$this->input->post('nama_produk');
				$tanggal=$this->input->post('tanggal');
				$keterangan=$this->input->post('keterangan');
				$kategori=$this->input->post('kategori');
				foreach($this->Produk_model->namakat($kategori) as $row){
					$idkat=$row->id_kategori;
				}
				$stok=$this->input->post('stok');
				$harga=$this->input->post('harga');
				$berat = $this->input->post('berat');
	            $gambar='assets/images/'.$gbr['file_name'];
				$this->Produk_model->tambah_produk($idproduk,$nama_produk,$tanggal,$keterangan,$idkat,$stok,$harga,$gambar,$berat);
				echo "<script>
	                alert('Upload berhasil');
	                window.location.href = '".base_url('admin/produk')."';
	            </script>";
			}else{
				echo "<script>
	                alert('Upload gagal ukuran file terlalu besar minimal 1-2mb');
	                window.location.href = '".base_url('admin/produk')."';
	            </script>";
			}
	                 
	    }else{
			echo "<script>
	                alert('Upload gagal');
	                window.location.href = '".base_url('admin/produk')."';
	            </script>";
		}
	}

	function hapus_produk(){
		$id_produk= $this->uri->segment(4);
		$this->Produk_model->hapus_produk($id_produk);
		redirect('admin/produk');
	}

	function update_produk(){
		$id_produk= $this->uri->segment(4);
		$data['kategori'] = $this->Produk_model->tampil_kategori();
		$data['produk'] = $this->Produk_model->tampil_produk();
		$data['produk2'] = $this->Produk_model->tampil_produk2($id_produk);

		$this->load->view('element/admin/admin-header');
		$this->load->view('admin/admin-edit-produk',$data);
		$this->load->view('element/admin/admin-footer');
	}

	function update_produk2(){
		$id_produk= $this->uri->segment(4);
		$nama_produk=$this->input->post('nama_produk');
		$kategori=$this->input->post('kategori');
		foreach($this->Produk_model->namakat($kategori) as $row){
			$idkat=$row->id_kategori;
		}
		$tanggal=$this->input->post('tanggal');
		$keterangan=$this->input->post('keterangan');
		$stok=$this->input->post('stok');
		$harga=$this->input->post('harga');
		$berat = $this->input->post('berat');
		$this->Produk_model->update_produk($id_produk,$nama_produk,$tanggal,$keterangan,$kategori,$stok,$harga,$idkat,$berat);
		echo "<script>
			alert('Edit produk berhasil');
			window.location.href = '".base_url('admin/produk')."';
		</script>";//Url tujuan
	}

	public function tambahstok(){
		$id_produk = $this->input->post('id_produk');
		$tambahstok = $this->input->post('tambahstok');

		$cek = $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'")->num_rows();
		if ($cek>=1) {
			$this->db->query("UPDATE `produk` SET `stok`=stok+'$tambahstok' WHERE id_produk='$id_produk'");
			echo "<script>
                alert('Stok berhasil ditambahkan');
                window.location.href = '".base_url('admin/produk')."';
            </script>";
		}else{
			echo "<script>
                alert('Id produk tidak ditemukan!');
                window.location.href = '".base_url('admin/produk')."';
            </script>";
		}
	}
}
?>