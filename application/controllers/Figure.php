<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Figure extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
		date_default_timezone_set("Asia/Kolkata");
		
	}
	
	public function index(){
		$this->load->view('figure.php');
	}
}
