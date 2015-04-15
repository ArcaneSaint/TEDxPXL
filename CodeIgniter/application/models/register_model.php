<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function validate(){
		
		// Get input
		$email = $this->security->xss_clean($this->input->post('user_registration_form[email]'));
		$password = $this->security->xss_clean($this->input->post('user_registration_form[plainPassword][first]'));
		$firstName = $this->security->xss_clean($this->input->post('user_registration_form[firstName]'));
		$lastName = $this->security->xss_clean($this->input->post('user_registration_form[lastName]'));
		//$hash = password_hash($password, PASSWORD_DEFAULT);
		
		//check email unique
		$this->db->where('email', $email);
		$queryCheck = $this->db->get('users');
		
		
		if($queryCheck->num_rows() > 0){
			//email already exists.
			return FALSE;
		}
		else {
			//email does not exist.
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$data = array(
               'email' => $email,
               'firstname' => $firstName,
               'lastname' => $lastName,
               'password' => $hash
            );
			$this->db->insert('users', $data); 
			return TRUE;
		}
		
		//$this->db->where('username', $username);
		//$this->db->where('password', $password);
		/*
		$query = $this->db->get('users');
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if(password_verify($password, $row->password)){
				$data = array('username' => $row->username,
							'validated' => true
							);
				$this->session->set_userdata($data);
				return true;
			}
		}
		
		$this->session->set_userdata('pwd', $password);
		return false;
		*/
	}
}
