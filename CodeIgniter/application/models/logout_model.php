<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logout_model extends CI_Model {

	function __construct(){
        parent::__construct();
    }
	
	public function validate(){
		$data = array(
			'validated' => false
		);
		$this->session->set_userdata($data);
	}
}
