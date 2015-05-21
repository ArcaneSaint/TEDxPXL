<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_Model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function add($threadID, $userID, $date, $title, $body)
	{
		$data = array(
			'threadID' => $threadID,
			'userID' => $userID,
			'date' => $date,
			'title' => $title,
			'body' => $body
		);
		$newPost = $this->db->insert('posts', $data);
		return $newPost;
	}
	
	public function findPosts($match)
	{
	//->like('title', $match)->or_like('body', $match)
		$this->db->select('id, title, body, threadID')->from('posts')->like('title', $match)->or_like('body', $match);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function get($id)
	{
		$this->db->select('threadID,userID,date,title,body,firstname,lastname')->where('id', $id)->from('posts')->join('users', 'users.id = posts.userID');
		$post = $this->db->get()->row();
		
		return $post;
	}
	
	public function all($threadID)
	{
		if(isset($threadID)){
			$this->db->select('posts.id,threadID,userID,date,title,body,firstname,lastname')->from('posts')->where('threadID', $threadID)->join('users', 'users.id = posts.userID');
			$posts = $this->db->get()->result_array();
			return $posts;
		}
		else
		{
			$this->db->select('threadID,userID,date,title,body')->from('posts');
			$posts = $this->db->get()->result_array();
			return $posts;
		}
	}
	
	public function update($threadID, $userID, $date, $title, $body)
	{
		$data = array(
			'threadID' => $threadID,
			'userID' => $userID,
			'date' => $date,
			'title' => $title,
			'body' => $body
		);
		
		$this->db->where('id', $id)->update('posts', $data);
	}
	
	public function remove($id)
	{
		$this->db->where('id', $id)->delete('posts');
	}
}
