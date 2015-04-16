<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function validatePassword(){
		
		$oldpassword = $this->security->xss_clean($this->input->post('user_password_form[password][old]'));
		$newpassword = $this->security->xss_clean($this->input->post('user_password_form[password][first]'));
		
		
		$this->db->where('id', $this->session->userdata('id'));
		$query = $this->db->get('users');
		if ($query->num_rows() > 0)
		{
			if (password_verify($oldpassword, $query->row()->password))
			{
				if(!empty($newpassword)) 
				{
					$data['password'] = password_hash($newpassword, PASSWORD_DEFAULT);
					$this->db->update('users', $data);
					return TRUE;
				}
			}
		}
		return FALSE;
	}
	
	public function validate(){
		
		$id = $this->session->userdata('id');
		$email = $this->security->xss_clean($this->input->post('user_account_form[email]'));
		$firstName = $this->security->xss_clean($this->input->post('user_account_form[firstName]'));
		$lastName = $this->security->xss_clean($this->input->post('user_account_form[lastName]'));
		
		
		
		$data=array();
		
		if(!empty($email)) 
		{
			//update email address
			$data['email'] = $email;
		}
		if(!empty($firstName)) 
		{
			//update firstName
			$data['firstName'] = $firstName;
		}
		if(!empty($lastName)) 
		{
			//update lastName
			$data['lastName'] = $lastName;
		}
		
		if(!empty($data)) 
		{
			//update database
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			
			//update session data
			$sessionData = array(
							'id' => $id,
							'email' => $email,
							'firstName' => $firstname,
							'lastName' => $lastname,
							'validated' => true
							);
			$this->session->set_userdata($sessionData);
			return TRUE;
		}
		
		return FALSE;
	}
}
