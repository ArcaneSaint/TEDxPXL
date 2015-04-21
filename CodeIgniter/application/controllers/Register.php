<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index($errorMessage = null)
	{
		$this->load->library('form_validation');
		//init global vars
		$data['thisPage'] = "Register";
		$data['errorMessage'] = $errorMessage;
		
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/register');
		$this->load->view('templates/footer');
	}
	
	public function process() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user_registration_form[firstName]', 'First Name', 'required|max_length[30]');
		$this->form_validation->set_rules('user_registration_form[lastName]', 'Last Name', 'required|max_length[30]');
		$this->form_validation->set_rules('user_registration_form[plainPassword][first]', 'Password', 'required|matches[user_registration_form[plainPassword][second]]|min_length[8]');
		$this->form_validation->set_rules('user_registration_form[plainPassword][second]', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('user_registration_form[email]', 'Email', 'required|valid_email|max_length[30]');
	
	
	
		// Load the model
        $this->load->model('register_model');
        // Validate the user can login
		if($this->form_validation->run() == false){
			$this->index();
		} else{
			$result = $this->register_model->validate();
			// Now we verify the result
			if(! $result){
				// If registration failed, show them registration page again
				$this->index('Registration failed.');
			}else{
				// If registration succeeded
				// Send them to members area
				redirect('home');
			}      
		}
	}
}
