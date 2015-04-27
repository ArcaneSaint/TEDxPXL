<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }

	public function getUser($id)
	{
		$this->db->select('users.id, email, firstname, lastname, userroles.role')->from('users')->where('users.id',$id)->join('userroles', 'userroles.id = users.role');
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getEvent($id)
	{
		$this->db->select('id, name, description, date, image, location')->from('events')->where('id',$id);
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getUsers($number,$offset)
	{
		$this->db->select('users.id, email, firstname, lastname, userroles.role')->from('users')->join('userroles', 'userroles.id = users.role');
		$this->db->limit($offset,$number);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function getEvents($number,$offset)
	{
		$this->db->select('id, name, location, date')->from('events');
		$this->db->limit($offset,$number);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function getRoles()
	{
		$this->db->select('id, role')->from('userroles');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function resetPassword(){
		$id = $this->security->xss_clean($this->input->post('user_account_update[id]'));
		
		$password=password_hash('password',PASSWORD_DEFAULT);
		//update database
		$this->db->where('id', $id)->update('users', array('password'=>$password));
	}
	
	public function deleteUser(){
		$id = $this->security->xss_clean($this->input->post('user_account_update[id]'));
		
		$this->db->where('id', $id)->delete('users');
		//$this->db->where('id', $id)->update('users', array('password'=>$password));
		
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

	public function updateEvent(){
		
		$id = $this->security->xss_clean($this->input->post('event_update[id]'));
		$name = $this->security->xss_clean($this->input->post('event_update[name]'));
		$description = $this->security->xss_clean($this->input->post('event_update[description]'));
		$location = $this->security->xss_clean($this->input->post('event_update[location]'));
		//$role = $this->security->xss_clean($this->input->post('event_update[image]'));
		$date = $this->security->xss_clean($this->input->post('event_update[date]'));
		
		

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
			return FALSE;
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
		}
		$data=array(
				'id' => $id,
				'name'=>$name,
				'description'=>$description,
				'location'=>$location,
				'image'=>$this->upload->data()['file_name'],
				'date'=>$date
				);
		if(!empty($data)) 
		{
			//update database
			$this->db->where('id', $id);
			$this->db->update('events', $data);
			return TRUE;
		}
		return FALSE;
	}
	}

?>