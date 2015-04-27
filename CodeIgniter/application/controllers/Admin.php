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
		if($this->session->userdata('role')==='admin')
		{
			//load php helpers/libraries/models
			$this->load->library('form_validation');
			$this->load->model('admin_model');
			$this->load->model('event_model');
			$this->load->helper('url');
			
			
			//init global vars
			$data['thisPage'] = "Admin";
			
			$users = $this->admin_model->getUsers(0,10);
			$events = $this->event_model->getEvents(0,10);
			$roles = $this->admin_model->getRoles();
			
			/*foreach($users as &$user){
				$user['role'] = $roles[$user['role']-1]['role'];
			}*/
			
			$data['users'] = $users;
			$data['events'] = $events;
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
		else{
			//init global vars
			$data['thisPage'] = "Admin";
			$data['errorMessage'] = 'Unauthorized access';
			$data['errorType'] = 401;
			//pass data to view
			$this->load->vars($data);
			
			//load header
			$this->load->view('templates/header');
			//load page
			$this->load->view('templates/error');
			//load footer
			$this->load->view('templates/footer');
			
			
			//redirect('home?'.$this->session->userdata('role'));
			//show_404();
			//show_error('unauthorized', 401);
			//$this->output->set_status_header('401');
		}
	}
	
	public function update()
	{
        $this->load->model('admin_model');
		$this->load->model('event_model');
		$save=$this->input->post('user_account_update[save]');
		$saveevent=$this->input->post('event_update[save]');
		$deleteevent=$this->input->post('event_update[delete]');
		$reset=$this->input->post('user_account_update[passwordReset]');
		$delete=$this->input->post('user_account_update[delete]');
		if(isset($save))
		{
			$this->admin_model->update();
		} else if (isset($reset)){
			$this->admin_model->resetPassword();
		} else if (isset($delete)){
			$this->admin_model->deleteUser();
		} else if (isset($saveevent)){
			if(!$this->event_model->update()){
				echo "ERROR";
				return;
			};
		} else if (isset($deleteevent)){
			$this->event_model->deleteEvent();
			
		}
		$this->index();
	}
	
	
	public function eedit($id)
	{
		//load php helpers/libraries/models
        $this->load->model('admin_model');
        $this->load->model('event_model');
		$this->load->helper('url');
		
		//init global vars
		$data['event'] = $this->event_model->getEvent($id);
		$data['thisPage'] = "Admin";
		$data['display']='event';
		
		//pass data to view
		$this->load->vars($data);
		//load header
		$this->load->view('templates/header');
		//load page
		$this->load->view('pages/admin');
		//load footer
		$this->load->view('templates/footer');
	}
	
	public function add()
	{
		$save=$this->input->post('event_update[save]');
		if(isset($save)){
			$this->load->model('event_model');
			if($this->event_model->add()){
				$this->index();
			}
		//$this->add();
		}
		else{
			//load php helpers/libraries/models
			$this->load->helper('url');
			
			//init global vars
			$data['thisPage'] = "Admin";
			$data['display']='add';
			
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
	
	public function edit($id)
	{
		//load php helpers/libraries/models
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
