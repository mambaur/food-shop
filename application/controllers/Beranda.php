<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_produk');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') == "login"){
			redirect('Welcome','refresh');
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
                 
            $config['base_url'] = base_url() . 'Beranda/index';
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
         
		$this->load->view('U_beranda',$data);
		$this->load->view('element/Footer');
	}

	public function detail($id){
		$data['data'] = $this->M_produk->tampil_kategori();
		$data['produk'] = $this->M_produk->tampil_detailproduk($id);
		$this->load->view('U_detail',$data);
		$this->load->view('element/Footer');
	}
	public function katproduk($idk){
		$data['data'] = $this->M_produk->tampil_kategori();
		$data['produk'] = $this->M_produk->katprod($idk);
		$this->load->view('U_beranda',$data);
		$this->load->view('element/Footer');
	}
	public function About(){
		$this->load->view('Tentangpurnamajati');
		$this->load->view('element/Footer');
	}
}
