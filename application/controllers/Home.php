<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_produk');		
		$this->load->model('M_contact');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') == "login"){
			redirect('user','refresh');
		}
	}

	public function index(){
		$data = array();
		$data['data'] = $this->M_produk->tampil_kategori();
        $params = array();
        $limit_per_page = 6;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->M_produk->get_total();
     
        if ($total_records > 0)
        {
            $data["produk"] = $this->M_produk->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'Home/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<ul class="pagination">';        
	        $config['full_tag_close'] = '</ul>';        
	        $config['first_link'] = 'First';        
	        $config['last_link'] = 'Last';        
	        $config['first_tag_open'] = '<li>';        
	        $config['first_tag_close'] = '</li>';        
	        $config['prev_link'] = '&laquo';        
	        $config['prev_tag_open'] = '<li class="prev">';        
	        $config['prev_tag_close'] = '</li>';        
	        $config['next_link'] = '&raquo';        
	        $config['next_tag_open'] = '<li>';        
	        $config['next_tag_close'] = '</li>';        
	        $config['last_tag_open'] = '<li>';        
	        $config['last_tag_close'] = '</li>';        
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';        
	        $config['cur_tag_close'] = '</a></li>';        
	        $config['num_tag_open'] = '<li>';        
	        $config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
         
		$this->load->view('index',$data);
		$this->load->view('element/footer');
	}

	public function detail(){
		$id = $this->input->get('id');
		$data = [
			'data' => $this->M_produk->tampil_kategori(),
			'produk' => $this->M_produk->tampil_detailproduk($id)
		];
		$this->load->view('detail',$data);
		$this->load->view('element/footer');
	}

	public function kategori(){
		$id = $this->input->get('id');
		$data = [
			'data' => $this->M_produk->tampil_kategori(),
			'produk' => $this->M_produk->katprod($id)
		];
		$this->load->view('index',$data);
		$this->load->view('element/footer');
	}

	public function about(){
		$this->load->view('about');
		$this->load->view('element/footer');
	}

	public function contact(){
		$this->load->view('contact');
		$this->load->view('element/Footer');
	}

	public function pesan(){
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$judul=$this->input->post('judul');
		$pesan=$this->input->post('pesan');
		$tgl=date('Y-m-d');

		$this->M_contact->insert_contact($nama,$email,$judul,$pesan,$tgl);
		$cek = $this->db->get_where('tentang', [
			'nama_tentang' => $nama, 
			'judul_tentang' => $judul, 
			'isi_pesan' => $pesan
		])->num_rows();
		// $cek = $this->db->query("SELECT * FROM tentang WHERE nama_tentang='$nama' AND judul_tentang='$judul' AND isi_pesan='$pesan'")->num_rows();
		if ($cek >= 1){
			echo "<script>
                alert('Pesan telah terkirim');
                window.location.href = '".base_url('home/contact')."';
            </script>";//Url tujuan
		}elseif ($cek == 0) {
			echo "<script>
                alert('Pesan gagal terkirim');
                window.location.href = '".base_url('home/contact')."';
            </script>";//Url tujuan
		}
	}
}
