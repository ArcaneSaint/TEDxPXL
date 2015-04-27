<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }

	public function getEvent($id)
	{
		$this->db->select('id, name, description, image, date, location')->from('events')->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getEvents($number,$offset)
	{
		$this->db->select('id, name, location, date')->from('events');
		$this->db->limit($offset,$number);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function deleteEvent($id){
		$this->db->where('id', $id)->delete('events');
		
	}
	
	public function add(){
		$name = $this->security->xss_clean($this->input->post('event_update[name]'));
		$description = $this->security->xss_clean($this->input->post('event_update[description]'));
		$location = $this->security->xss_clean($this->input->post('event_update[location]'));
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
			//$data = array('upload_data' => $this->upload->data());
		}
		
		try{
			$data = array(
			   'name' => $name,
			   'location' => $location,
			   'date' => $date,
			   'description' => $description,
			   'image'=>$this->upload->data()['file_name']
			);
			$this->db->insert('events', $data);
			//echo $this->upload->data()['file_name'];
			return TRUE;
		}
		catch(Exception $e){
			echo "ERROR";
			return FALSE;
		}
		
	}
	
	public function update(){
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

			//$this->load->view('upload_success', $data);
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