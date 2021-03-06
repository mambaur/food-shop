<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/User_admin');
		$this->load->helper(array('url'));
		if($this->session->userdata('owner') != "333"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('admin/login')."';
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
            $data["user"] = $this->User_admin->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'owner/user/index';
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

		$this->load->view('element/owner/owner-header');
		$this->load->view('owner/owner-user',$data);
		$this->load->view('element/owner/owner-footer');
	}
	function hapus_user(){
		$id_user= $this->uri->segment(4);
		$this->User_admin->hapus_user($id_user);
		redirect('owner/user');
	}
} 
?>