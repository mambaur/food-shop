<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MA_user extends CI_Model {

    // function tampil_user(){
    //   $query = $this->db->query("SELECT * FROM user WHERE level_id_level='111'");
    //   return $query->result();
    // }

    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id_user", "DESC");
        $this->db->where("level_id_level","111");
        $query = $this->db->get("user");
        
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }

    function hapus_user($id_user){
		$query = $this->db->query("DELETE FROM `user` WHERE id_user='$id_user'");
	}
   
}
?>