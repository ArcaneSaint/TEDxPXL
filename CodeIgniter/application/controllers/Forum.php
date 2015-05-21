<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function thread($id){
		$this->load->model('thread_model');
		$this->load->model('post_model');
		$data['thread'] = $this->thread_model->get($id);
		
		$postReply=$this->input->post('postReply');
		if(isset($postReply)) {
		$val = $this->session->userdata('validated');
			if(isset($val)){
				$replyBody=$this->input->post('replyTextArea');
				$this->post_model->add($id, $this->session->userdata('id'), date("Y-m-d H:i:s"), $data['thread']->title, $replyBody);
			}
		}
		
		
		
		//init global vars
		$data['thread'] = $this->thread_model->get($id);
		$data['posts'] = $this->post_model->all($id);
		
		$data['thisPage'] = "Forum";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		//load page
		echo date("YYYY-MM-DD");
		$this->load->view('templates/header');
		echo date("YYYY-MM-DD");
		$this->load->view('pages/forum');
		echo date("YYYY-MM-DD");
		$this->load->view('templates/footer');
		echo date("YYYY-mm-dd");
	}
	
	public function board($id){
	
		$this->load->model('thread_model');
		$this->load->model('board_model');
		$newThread=$this->input->post('newThread');
		if(isset($newThread)) {
		$val = $this->session->userdata('validated');
			if(isset($val)){
				$this->load->model('post_model');
				$newTitle=$this->input->post('newThreadTitleArea');
				$newBody=$this->input->post('newThreadTextArea');
				//$userID, $title, $date
				$newThreadID = $this->thread_model->add($id, $this->session->userdata('id'), $newTitle, date("Y-m-d H:i:s"));
				$this->post_model->add($newThreadID, $this->session->userdata('id'), date("Y-m-d H:i:s"), $newTitle, $newBody);
				redirect("Forum/thread/".$newThreadID);
			}
		}
		
		
		//init global vars
		$data['threads'] = $this->thread_model->all($id);
		$data['board'] = $this->board_model->get($id);
		$data['thisPage'] = "Forum";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		//load page
		$this->load->view('templates/header');
		$this->load->view('pages/forum');
		$this->load->view('templates/footer');
	}
	
	public function index()
	{
		$this->load->model('board_model');
		
		//init global vars
		$data['boards'] = $this->board_model->all();
		$data['thisPage'] = "Forum";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		//load page
		$this->load->view('templates/header');
		$this->load->view('pages/forum');
		$this->load->view('templates/footer');
	}
}
