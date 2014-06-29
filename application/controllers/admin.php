<?php 
class Admin extends CI_Controller{

	function _construct()
	{
		parent::__construct();
		$this->load->model('modeldata');
	}

	function index()
	{
		if ($this->admin_model->is_logged_in()){
			redirect('admin/main');
		}else{
			redirect('admin/login');
		}
	}

    function login()
    {
		if (!$this->admin_model->is_logged_in()){
			$this->load->view('admin/login');
		}else{
			redirect('admin/main');
		}
	}

    function main()
    {
		if ($this->admin_model->is_logged_in()){
			$data['content'] = 'admin/main';
			$this->load->view('admin/page',$data);
		}else{
			redirect('admin/login');
		}	
	}

    function new_event()
    {
		if ($this->admin_model->is_logged_in()){
			$data['content'] = 'admin/new';
			$this->load->view('admin/page',$data);
		}else{
			redirect('admin/login');
		}	
	}

    function logout()
    {
        session_start();
		unset($_SESSION[md5('filemanager')]);
		$this->session->sess_destroy();
		session_destroy();
		redirect('admin');
	}
}