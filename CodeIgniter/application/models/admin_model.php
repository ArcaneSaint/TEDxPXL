<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }

	public function getUser($id)
	{
		$this->db->select('id, email, firstname, lastname, role')->from('users')->where('id',$id);
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getUsers()
	{
		$this->db->select('id, email, firstname, lastname, role')->from('users');
		$query = $this->db->get();
		
		return $query->result_array();
		
	}
	public function getRoles()
	{
		$this->db->select('id, name')->from('userroles');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function update(){
		$id = $this->security->xss_clean($this->input->post('user_account_update[id]'));
		$email = $this->security->xss_clean($this->input->post('user_account_update[email]'));
		$firstName = $this->security->xss_clean($this->input->post('user_account_update[firstName]'));
		$lastName = $this->security->xss_clean($this->input->post('user_account_update[lastName]'));
		$role = $this->security->xss_clean($this->input->post('user_account_update[role]'));
		
		
		
		$data=array(
				'id' => $id,
				'email'=>$email,
				'firstname'=>$firstName,
				'lastname'=>$lastName,
				'role'=>$role
				);
		if(!empty($data)) 
		{
			//update database
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			
			return TRUE;
		}
		
		return FALSE;
	}
}

?>