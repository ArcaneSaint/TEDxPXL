<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logout_model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function validate(){
		$this->session->sess_destroy();
		/*$data = array(
			'validated' => false
		);
		$this->session->set_userdata($data);*/
	}
}
