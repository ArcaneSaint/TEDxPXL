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
		
		$this->db->select('users.id, password, email, firstname, lastname, userroles.role')->from('users')->where('email', $email)->join('userroles', 'userroles.id = users.role');
		//$this->db->where('password', $password);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			/*$this->db->select('role')->from('userroles')->where('id',$row->role);
			$roles = $this->db->get();*/
		
			if(password_verify($password, $row->password)){
				$data = array(
							'id' => $row->id,
							'email' => $row->email,
							'firstName' => $row->firstname,
							'lastName' => $row->lastname,
							'role' => $row->role,
							'validated' => true
							);
				$this->session->set_userdata($data);
				return true;
			}
		}
		return false;
	}
}