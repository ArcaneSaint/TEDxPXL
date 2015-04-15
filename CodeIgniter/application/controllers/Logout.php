<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index()
	{
		//init global vars
		$data['thisPage'] = "Login";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/login');
		$this->load->view('templates/footer');
	}
	
	public function process() {
		// Load the model
        $this->load->model('logout_model');
        // Validate the user can login
        $this->logout_model->validate();
        
		$this->index();
	}
}
