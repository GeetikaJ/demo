<?php defined('BASEPATH') or exit('No direct script access allowed');
class Home_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
		
	public function get_adminlogin_by_username($username,$password){

		$this->db->where("username",$username);
		$this->db->where("password",$password);
		$this->db->where("status",'1');
		$this->db->from('tbl_userdetails');		
		$query= $this->db->get(); //echo $this->db->last_query(); die();			
		return $query->row_array();
	}	
	
	public function get_adminlogin($id){		   
		$this->db->where('ID',$id);
		$this->db->from('tbl_userdetails');
		$query= $this->db->get();
		if($query -> num_rows() >=1){
			return $query->row_array();
		}else{
			return false;
		}
	}	
	
	public function insert($table=null, $insert_data=array()){ 		
        $this->db->insert($table,$insert_data);    // echo $this->db->last_query(); die();  
        return true;
    }
	
	public function get_router_details(){
		
		$this->db->from('tbl_router_details');		
		$query= $this->db->get(); //echo $this->db->last_query(); die();				
		return $query->result_array();;
	}	
	
	public function soft_delete($id, $data){
		
		$this->db->where('id',$id);
		$res = $this->db->update('tbl_router_details', $data);
		if($res==1){
			return "Updated";
		}else{
			return false;
		}
	}	
	
	public function get_router_details_by_id($id){
		
		$this->db->where('ID',$id);
		$this->db->from('tbl_router_details');
		$query= $this->db->get(); //echo $this->db->last_query(); die();
		if($query -> num_rows() >=1){
			return $query->row_array();
		}else{
			return false;
		}
	}	
	
	public function update_by_field($table, $update_data, $id){        
		$this->db->where("ID", $id);
		$this->db->set($update_data);
		$query = $this->db->update($table);   //echo $this->db->last_query(); die();
		return ($this->db->affected_rows() > 0) ? true : FALSE;
	}
	
	public function get_unique_loopback($loopback=NULL){ 	
		$this->db->select('loopback');
		$this->db->from('tbl_router_details');
		$this->db->where('loopback',$loopback);	
		$this->db->where('status', '1');			
		$query = $this->db->get(); 
		return $query->num_rows();		
	}
	
}