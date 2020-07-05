<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_user extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_user');
		$this->load->helper(array('url'));
		if($this->session->userdata('admin') != "222"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data = array();

		// ----------------------Pagination---------------------------
        // init params
        $params = array();
        $limit_per_page = 10;
        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
        $total_records = $this->db->query("SELECT * FROM user WHERE level_id_level='111'")->num_rows();
     
        if ($total_records > 0)
        {
            // get current page records
            $data["user"] = $this->MA_user->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'Admin_controller/A_user/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;
             
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
		$this->load->view('element/Admin/Header_admin');
		$this->load->view('Admin_view/VA_user',$data);
		$this->load->view('element/Admin/Footer_admin');
	}
	function hapus_user(){
		$id_user= $this->uri->segment(4);
		$this->MA_user->hapus_user($id_user);
		redirect('Admin_controller/A_user');
	}
} 
?>