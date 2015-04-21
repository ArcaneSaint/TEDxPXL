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
			try{
				//Get default user role
				$this->db->where('role','user');
				$role = $this->db->get('userroles')->row();
			
			
				//email does not exist.
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$data = array(
				   'email' => $email,
				   'firstname' => $firstName,
				   'lastname' => $lastName,
				   'password' => $hash,
				   'role' => $role->id
				);
				$this->db->insert('users', $data); 
				$sessionData = array(
								'id' => $data['id'],
								'email' => $data['email'],
								'firstName' => $data['firstName'],
								'lastName' => $data['lastName'],
								'role' => $role['role'],
								'validated' => true
								);
				$this->session->set_userdata($sessionData);
				return TRUE;
			}
			catch(Exception $e){
				return FALSE;
			}
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
