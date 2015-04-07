<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index()
	{
		//init global vars
		$data['thisPage'] = "Events";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/events');
		$this->load->view('templates/footer');
	}
}
