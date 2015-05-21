<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Board_model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function add($name, $description)
	{
		$data = array(
			'name' => $name,
			'description' => $description
		);
		$newBoard = $this->db->insert('boards', $data);
		return $newBoard;
	}
	
	public function get($id)
	{
		$this->db->select('id, name, description')->where('id', $id)->from('boards');
		$board = $this->db->get()->row();
		
		return $board;
	}
	
	public function all()
	{
		$this->db->select('id, name, description')->from('boards');
		$boards = $this->db->get()->result_array();

		return $boards;
	}
	
	public function update($id, $name, $description)
	{
		$data=array(
			'name'=>$name,
			'description'=>$description
		);
		
		$this->db->where('id', $id)->update('boards', $data);
	}
	
	public function remove($id)
	{
		$this->db->where('id', $id)->delete('boards');
	}
}
