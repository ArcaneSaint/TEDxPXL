<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function validate(){
		// Get input
		$email = $this->security->xss_clean($this->input->post('_email'));
		$password = $this->security->xss_clean($this->input->post('_password'));
		//$hash = password_hash($password, PASSWORD_DEFAULT);
		
		$this->db->where('email', $email);
		//$this->db->where('password', $password);
		
		$query = $this->db->get('users');
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if(password_verify($password, $row->password)){
				$data = array('email' => $row->email,
							'firstName' => $row->firstName,
							'lastName' => $row->lastName,
							'validated' => true
							);
				$this->session->set_userdata($data);
				return true;
			}
		}
		
		$this->session->set_userdata('pwd', $password);
		return false;
	}
}
