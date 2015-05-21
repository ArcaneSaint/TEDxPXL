<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index()
	{
		//init global vars
        $this->load->model('account_model');
		
		$data['thisPage'] = "Home";
		$data['newest'] = $result = $this->account_model->getNewest();
		$this->load->vars($data);
	
		//load php helpers
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/home');
		$this->load->view('templates/footer');
	}
}
