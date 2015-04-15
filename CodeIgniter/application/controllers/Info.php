<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index()
	{
		//init global vars
		$data['thisPage'] = "Info";
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/info');
		$this->load->view('templates/footer');
	}
}
