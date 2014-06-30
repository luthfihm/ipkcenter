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

    function main($p=1)
    {
		if (($this->admin_model->is_logged_in())&&($p>0)){
			$data['content'] = 'admin/main';
            $data['categories'] = $this->events_model->GetListCategory();
            $data['events'] = $this->events_model->GetEvents(10,($p-1)*10);
            $data['kat'] = 'all';
            if($p == 1)
            {
                $data['prev'] = FALSE;
            }
            else
            {
                $data['prev'] = $this->events_model->IsPageExist(10,($p-2)*10);
            }
            $data['next'] = $this->events_model->IsPageExist(10,$p*10);
            $data['page'] = $p;
			$this->load->view('admin/page',$data);
		}else{
			redirect('admin/login');
		}	
	}

    function kat($kat,$p=1)
    {
		if (($this->admin_model->is_logged_in())&&($p>0)){
			$data['content'] = 'admin/main';
            $data['categories'] = $this->events_model->GetListCategory();
            $data['events'] = $this->events_model->GetEventsByKat($kat,10,($p-1)*10);
            $data['kat'] = $kat;
            if($p == 1)
            {
                $data['prev'] = FALSE;
            }
            else
            {
                $data['prev'] = $this->events_model->IsPageExistKat($kat,10,($p-2)*10);
            }
            $data['next'] = $this->events_model->IsPageExistKat($kat,10,$p*10);
            $data['page'] = $p;
			$this->load->view('admin/page',$data);
		}else{
			redirect('admin/login');
		}	
	}

    function unkat($p=1)
    {
		if (($this->admin_model->is_logged_in())&&($p>0)){
            $kat = NULL;
			$data['content'] = 'admin/main';
            $data['categories'] = $this->events_model->GetListCategory();
            $data['events'] = $this->events_model->GetEventsByKat($kat,10,($p-1)*10);
            $data['kat'] = $kat;
            if($p == 1)
            {
                $data['prev'] = FALSE;
            }
            else
            {
                $data['prev'] = $this->events_model->IsPageExistKat($kat,10,($p-2)*10);
            }
            $data['next'] = $this->events_model->IsPageExistKat($kat,10,$p*10);
            $data['page'] = $p;
			$this->load->view('admin/page',$data);
		}else{
			redirect('admin/login');
		}	
	}

    function new_event()
    {
		if ($this->admin_model->is_logged_in()){
			$data['content'] = 'admin/new';
            $data['categories'] = $this->events_model->GetListCategory();
			$this->load->view('admin/page',$data);
		}else{
			redirect('admin/login');
		}	
	}

    function edit($id)
    {
		if ($this->admin_model->is_logged_in()){
			$data['content'] = 'admin/edit';
            $data['categories'] = $this->events_model->GetListCategory();
            $data['event'] = $this->events_model->GetEventByID($id);
			$this->load->view('admin/page',$data);
		}else{
			redirect('admin/login');
		}	
	}

    function file()
    {
		if ($this->admin_model->is_logged_in()){
			$data['content'] = 'admin/file';
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