<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index()
	{
		//init global vars
		$data['thisPage'] = "Search";
		
		$searchString=$this->input->post('searchText');
		
		$this->load->model('post_model');
		$this->load->model('event_model');
		$data['events']=$this->event_model->findEvents($searchString);
		$data['posts']=$this->post_model->findPosts($searchString);
		
		$this->load->vars($data);
		
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/search');
		$this->load->view('templates/footer');
	}
	
	public function process()
	{
		$this->load->model('search_model');
	}
}
