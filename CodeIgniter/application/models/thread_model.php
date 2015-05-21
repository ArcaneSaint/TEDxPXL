<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Thread_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function add($boardID, $userID, $title, $date)
	{
		$data = array(
			'boardID' => $boardID,
			'userID' => $userID,
			'title' => $title,
			'date' => $date
		);
		$this->db->insert('threads', $data);
		$newThreadID = $this->db->insert_id();
		return $newThreadID;
	}
	
	public function get($id)
	{
		$this->db->select('id, userID, title, date')->where('id', $id)->from('threads');
		$thread = $this->db->get()->row();
		
		return $thread;
	}
	
	public function all($boardID=null)
	{
		if(isset($boardID)){
			$this->db->select('threads.id, userID, title, date, users.email')->from('threads')->where('boardID', $boardID)->join('users', 'users.id = threads.userID');;
			$threads = $this->db->get()->result_array();
			return $threads;
		}
		else
		{
			$this->db->select('userID, title, date')->from('threads');
			$threads = $this->db->get()->result_array();
			return $threads;
		}
	}
	
	public function update($id, $userID, $title, $date)
	{
		$data=array(
			'userID' => $userID,
			'title'=>$title,
			'date'=>$date
		);
		
		$this->db->where('id', $id)->update('threads', $data);
	}
	
	public function remove($id)
	{
		$this->db->where('id', $id)->delete('threads');
	}
}
