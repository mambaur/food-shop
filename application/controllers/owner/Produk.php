<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Produk');
		$this->load->library('upload');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		$data['kategori'] = $this->Produk->tampil_kategori();
		$data['produk'] = $this->Produk->tampil_produk();
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-produk',$data);
		$this->load->view('element/owner/owner-footer');
	}
	public function insert_produk(){
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    // $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

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

	            $idproduk = $this->Produk->get_idproduk();
				$nama_produk=$this->input->post('nama_produk');
				$tanggal=$this->input->post('tanggal');
				$keterangan=$this->input->post('keterangan');
				$kategori=$this->input->post('kategori');
				foreach($this->Produk->namakat($kategori) as $row){
					$idkat=$row->id_kategori;
				}
				$stok=$this->input->post('stok');
				$harga=$this->input->post('harga');
				$berat = $this->input->post('berat');
	            $gambar='assets/images/'.$gbr['file_name'];
				$this->Produk->tambah_produk($idproduk,$nama_produk,$tanggal,$keterangan,$idkat,$stok,$harga,$gambar,$berat);
				echo "<script>
	                alert('Upload berhasil');
	                window.location.href = '".base_url('owner/produk')."';
	            </script>";//Url tujuan
			}
			else{
				echo "<script>
	                alert('Upload gagal ukuran file terlalu besar minimal 1-2mb');
	                window.location.href = '".base_url('owner/produk')."';
	            </script>";//Url tujuan
			}
	                 
	    }else{
			echo "<script>
	                alert('Upload gagal');
	                window.location.href = '".base_url('owner/produk')."';
	            </script>";//Url tujuan
		}
	}

	function hapus_produk(){
		$id_produk= $this->uri->segment(4);
		$this->Produk->hapus_produk($id_produk);
		redirect('owner/produk');
	}

	function update_produk(){
		$id_produk= $this->uri->segment(4);
		$data['kategori'] = $this->Produk->tampil_kategori();
		$data['produk'] = $this->Produk->tampil_produk();
		$data['produk2'] = $this->Produk->tampil_produk2($id_produk);
		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-edit-produk',$data);
		$this->load->view('element/owner/owner-footer');
	}

	function update_produk2(){
		$id_produk= $this->uri->segment(4);
		$nama_produk=$this->input->post('nama_produk');
		$kategori=$this->input->post('kategori');
		foreach($this->Produk->namakat($kategori) as $row){
			$idkat=$row->id_kategori;
		}
		$tanggal=$this->input->post('tanggal');
		$keterangan=$this->input->post('keterangan');
		$stok=$this->input->post('stok');
		$harga=$this->input->post('harga');
		$berat = $this->input->post('berat');
		$this->Produk->update_produk($id_produk,$nama_produk,$tanggal,$keterangan,$kategori,$stok,$harga,$idkat,$berat);
		echo "<script>
			alert('Edit produk berhasil');
			window.location.href = '".base_url('owner/produk')."';
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
                window.location.href = '".base_url('owner/produk')."';
            </script>";
		}else{
			echo "<script>
                alert('Id produk tidak ditemukan!');
                window.location.href = '".base_url('owner/produk')."';
            </script>";
		}
	}
}
?>