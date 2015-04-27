<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index()
	{
		//init global vars
		$data['thisPage'] = "News";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/news');
		$this->load->view('templates/footer');
	}
}
