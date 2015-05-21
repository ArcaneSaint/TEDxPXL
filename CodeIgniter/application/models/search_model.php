<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function add($userID, $title, $date)
	{
		$data = array(
			'userID' => $userID,
			'title' => $title,
			'date' => $date
		);
		$newThread = $this->db->insert('threads', $data);
		return $newThread;
	}
	
	public function findPosts($searchString)
	{
		
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
}
