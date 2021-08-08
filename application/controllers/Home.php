<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url_helper');
		$this->load->helper('email');		
		$this->load->model('Home_model');		
		
		date_default_timezone_set('Asia/Kolkata');

	}


	//for admin login 
	public function index(){		
		$this->load->view('templates/front_header');
		$this->load->view('pages/admin_login');
		$this->load->view('templates/front_footer');
		
	}
	
	public function login() {
		if($this->input->server('REQUEST_METHOD')=="POST"){							
			$username = $this->input->post('username');					
			$password = $this->input->post('password');	
						
				
			if($password !== ''){	
				//echo '1'; exit;
			
				$encoded_password=MD5($password);
				$login_data = $this->Home_model->get_adminlogin_by_username($username,$encoded_password);
				
				//print_r($login_data); exit;
				
				if($login_data){
					$id=$login_data['ID'];
					$login_data= $this->Home_model->get_adminlogin($id);
					$array_items = array('login_id' => '', 'name' => '', 'email' => '');
					$this->session->unset_userdata($array_items);					
					
					$this->session->set_userdata('login_id', $login_data['ID']);
					$this->session->set_userdata('name', $login_data['first_name']);
					$this->session->set_userdata('email', $login_data['email_id']);					
					$this->session->set_flashdata('success','Login successfully');	
					redirect('Home/admin_dashboard');				
				}else{						
					$result['message']="Invalid username and password";
					$result['success']="danger";		
					$this->session->set_flashdata('reject',$result);					
					redirect('Home');
				}
			} else{					
				$result['message']="Invalid username and password";
				$result['success']="danger";		
				$this->session->set_flashdata('reject',$result);					
				redirect('Home');
			}
		}
		else{			
			$this->load->view('templates/front_header');
			$this->load->view('pages/admin_login');
			$this->load->view('templates/front_footer');
		}
	}

	public function admin_logout(){
		//$this->updateLoginLog();
	    $this->session->sess_destroy();
		setcookie('ci_session','',time()-7000000,'/');
		setcookie('csrf_cookie_name','',time()-7000000,'/');
	    redirect('Home/admin');
	}
	
	public function admin_dashboard(){	
		$data['values'] = $this->Home_model->get_router_details();		
	    $this->load->view('templates/admin_header');
		$this->load->view('pages/admin_dashboard', $data);
		$this->load->view('templates/admin_footer');
	}
	
	public function create(){
		if($this->input->server('REQUEST_METHOD')=="POST"){	
		
			$post = $this->input->post();	
			
			$insert_data['SAP_ID'] = $post['SAP_ID'];
			$insert_data['hostname'] = $post['hostname'];
			$insert_data['loopback'] = $post['loopback'];
			$insert_data['mac_address'] = $post['mac_address'];
			$insert_data['ip_address'] = $post['ip_address'];
			$insert_data['router_type'] = $post['router_type'];
			$insert_data['price'] = $post['price'];
			$insert_data['status'] = $post['status'];
			$insert_data['created_date'] = date('Y-m-d H:i:s');
			$insert_data['created_by'] = $this->session->userdata('login_id');;
			$insert_data['created_by_ip'] = $this->input->ip_address();   			
			
			$response=@$this->Home_model->insert('tbl_router_details',$insert_data);
			
			if ($response==true){
				$result['message']="Router details added successfully";
				$result['success']="success";
				redirect('Home/admin_dashboard');	
			} else {
				$result['message']="Some error occured";
				$result['danger']="failed";
				redirect('Home/create');	
			}
			
			
		} else{
			$this->load->view('templates/admin_header');
			$this->load->view('pages/create_new');
			$this->load->view('templates/admin_footer');
		}	
	    
	}	
	
	public function delete_router($id){		
		$id =encryptor('decrypt',($id));
		$data = array(       
			'status' => 2,			
        );		
		
		$response=@$this->Home_model->soft_delete($id, $data);
		
		if ($response=="Updated"){
			$result['message']="Router details added successfully";
			$result['success']="success";
			redirect('Home/admin_dashboard');	
		} else {
			$result['message']="Some error occured";
			$result['danger']="failed";
			redirect('Home/admin_dashboard');	
		}		
	}	
	
	public function edit_router($id=NULL){
		$id =encryptor('decrypt',($id));
		if($this->input->server('REQUEST_METHOD')=="POST"){	
		
			$post = $this->input->post();	
			
			$update_data['SAP_ID'] = $post['SAP_ID'];
			$update_data['hostname'] = $post['hostname'];
			$update_data['loopback'] = $post['loopback'];
			$update_data['mac_address'] = $post['mac_address'];
			$update_data['ip_address'] = $post['ip_address'];
			$update_data['router_type'] = $post['router_type'];
			$update_data['price'] = $post['price'];	
			$update_data['status'] = $post['status'];			
			$update_data['modified_date'] = date('Y-m-d H:i:s');
			$update_data['modifed_by'] = $this->session->userdata('login_id');;
			$update_data['modified_by_ip'] = $this->input->ip_address();   			
			
			$response=@$this->Home_model->update_by_field('tbl_router_details',$update_data, $post['id']);
			
			if ($response==true){
				$result['message']="Router details updated successfully";
				$result['success']="success";
				redirect('Home/admin_dashboard');	
			} else {
				$result['message']="Some error occured";
				$result['danger']="failed";
				redirect('Home/create');	
			}
			
			
		}
		
		$response['data']=@$this->Home_model->get_router_details_by_id($id);
		
		if($response){			
			$this->load->view('templates/admin_header');
			$this->load->view('pages/edit_router', $response);
			$this->load->view('templates/admin_footer');
		} else {
			$result['message']="Data not found";
			$result['danger']="failed";
			redirect('Home/admin_dashboard');	
		}
			
	}	

	public function get_unique_loopback(){
		$csrf_token = $this->security->get_csrf_hash();
		$data = array(
   			'csrf_token' => $csrf_token
   			);
		if($this->input->server('REQUEST_METHOD') == "POST"){
   			$post=$this->input->post();
   			if($post['loopback']){
   				$loopback = $post['loopback'];
   				$response= $this->Home_model->get_unique_loopback($loopback);
   				//print_r($response); die();
   				if($response){
   					$data['loopback'] = $loopback;
   				}
   				else{
   					$data['loopback'] = 0;
   				}			
   				echo json_encode($data);
   			}
   		}
	}
}
