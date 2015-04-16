<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index()
	{
		redirect('home');
	}
	
	public function process() {
		// Load the model
        $this->load->model('logout_model');
        // Validate the user can login
        $this->logout_model->validate();
        
		$this->index();
	}
}
