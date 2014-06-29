<?php 
class Ajax extends CI_Controller{

	function _construct()
	{
		parent::__construct();
		$this->load->model('modeldata');
	}

	function index()
	{
		
	}

    function login_admin()
    {
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$query = $this->admin_model->validate($user,$pass);
		if($query){
			echo "true";
		}else{
			echo "false";
		}
	}
}