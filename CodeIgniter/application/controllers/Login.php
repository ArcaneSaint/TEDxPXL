<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index($errorMessage = NULL)
	{
		//init global vars
		$data['thisPage'] = "Login";
		$data['errorMessage'] = $errorMessage;
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/login');
		$this->load->view('templates/footer');
	}
	
	public function process() {
		$this->load->library('form_validation');
		// Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			$errorMessage = 'Gebruikersnaam of wachtwoord ongeldig';
            $this->index($errorMessage);
        }else{
            redirect('home');
        }      
	}
}
