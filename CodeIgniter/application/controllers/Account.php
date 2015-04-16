<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct(){
        parent::__construct();
    }
	
	public function index($errorMessage = NULL)
	{
		//init global vars
		$this->load->library('form_validation');
		$data['thisPage'] = "Account";
		$data['errorMessage'] = $errorMessage;
		
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/account');
		$this->load->view('templates/footer');
	}
	
	public function passupdate(){
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('user_password_form[password][old]', 'Old Password', 'min_length[8]');
		
        $this->load->model('account_model');
		
	}
	
	public function update() {
		
		$this->load->library('form_validation');
		
		// Load the model
        $this->load->model('account_model');
        // Validate the user can login
		if (isset($_POST['user_account_update']))
		{
			$this->form_validation->set_rules('user_account_form[firstName]', 'First Name', 'required|max_length[30]');
			$this->form_validation->set_rules('user_account_form[lastName]', 'Last Name', 'required|max_length[30]');
			$this->form_validation->set_rules('user_account_form[email]', 'Email', 'required|valid_email|max_length[30]');
		
			if($this->form_validation->run() == false)
			{
				$data['user_account_errors'] = validation_errors();
				$this->index(validation_errors());
			} 
			else
			{
				$result = $this->account_model->validate();
				// Now we verify the result
				if(! $result){
					$this->index('Account update failed');
				}else{
					$this->index('Account details updated');
				}      
			}
		}
		else if (isset($_POST['user_password_update_form']))
		{
		$this->form_validation->set_rules('user_password_form[password][old]', 'Password', 'required');
		
			$this->form_validation->set_rules('user_password_form[password][first]', 'New Password', 'required|matches[user_password_form[password][second]]|min_length[8]');
			$this->form_validation->set_rules('user_password_form[password][second]', 'New Password Confirmation', 'required|min_length[8]');
			//$this->form_validation->set_message('matches', 'Passwords do not match.');
			if($this->form_validation->run() == false)
			{
			//'Wachtwoorden komen niet overeen'
				$this->index(validation_errors());
			} 
			else
			{
				$result = $this->account_model->validatePassword();
				// Now we verify the result
				if(! $result){
					$this->index('Password change failed');
				}else{
					$this->index('Password changed');
				}      
			}
		}
	}
}
