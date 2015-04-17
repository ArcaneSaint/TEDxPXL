<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
    }
	/*
	ADMIN POWERS:
		*delete user
		*change user role
		*change user details
	*/
	
	public function index()
	{
		//load php helpers/libraries/models
		$this->load->library('form_validation');
        $this->load->model('admin_model');
		$this->load->helper('url');
		
		
		//init global vars
		$data['thisPage'] = "Admin";
		
		$users = $this->admin_model->getUsers();
		$roles = $this->admin_model->getRoles();
		
		foreach($users as &$user){
			$user['role'] = $roles[$user['role']-1]['name'];
		}
		
		$data['users'] = $users;
		$data['display']='all';
		
		//pass data to view
		$this->load->vars($data);
		//load header
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/admin');
		//load footer
		$this->load->view('templates/footer');
	}
	
	public function update()
	{
        $this->load->model('admin_model');
		$this->admin_model->update();
		$this->index();
	}
	
	public function edit($id)
	{
		//load php helpers/libraries/models
		$this->load->library('form_validation');
        $this->load->model('admin_model');
		$this->load->helper('url');
		
		//init global vars
		$data['user'] = $this->admin_model->getUser($id);
		$data['roles'] = $this->admin_model->getRoles();
		$data['thisPage'] = "Admin";
		$data['display']='single';
	
	
	
		//pass data to view
		$this->load->vars($data);
		//load header
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/admin');
		//load footer
		$this->load->view('templates/footer');
	}
}
