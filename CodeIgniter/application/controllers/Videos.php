<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function index()
	{
		//init global vars
		$data['thisPage'] = "Videos";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/videos');
		$this->load->view('templates/footer');
	}
}
