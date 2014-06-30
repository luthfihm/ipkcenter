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

    function new_event()
    {
        if ($this->admin_model->is_logged_in()){
            $title = $this->input->post('title');
            $date = date("Y-m-d");
            if ($this->input->post('category') == 'other')
            {
                $query = $this->events_model->AddCategory($this->input->post('other'));
                if ($query)
                {
                    $category = $this->events_model->GetLastCategory();
                }
            }
            else
            {
                $category = $this->input->post('category');
            }
            $tags = explode(',',$this->input->post('tags'));
            $content = $this->input->post('content');
            if ($category != "NULL")
            {
                $data = array(
                    'title'     => $title,
                    'date'      => $date,
                    'category'  => $category,
                    'content'   => $content
                );
            }
            else
            {
                $data = array(
                    'title'     => $title,
                    'date'      => $date,
                    'content'   => $content
                );
            }
            $query = $this->events_model->AddEvent($data);
            if ($query)
            {
                $id = $this->events_model->GetLastEvent();
                foreach ($tags as $tag)
                {
                    $query = $this->events_model->AddTag($id,$tag);
                }
            }
            if ($query)
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }
    function edit_event()
    {
        if ($this->admin_model->is_logged_in()){
            $title = $this->input->post('title');
            $date = date("Y-m-d");
            if ($this->input->post('category') == 'other')
            {
                $query = $this->events_model->AddCategory($this->input->post('other'));
                if ($query)
                {
                    $category = $this->events_model->GetLastCategory();
                }
            }
            else
            {
                $category = $this->input->post('category');
            }
            $tags = explode(',',$this->input->post('tags'));
            $content = $this->input->post('content');
            $id = $this->input->post('id');
            if ($category != "NULL")
            {
                $data = array(
                    'title'     => $title,
                    'date'      => $date,
                    'category'  => $category,
                    'content'   => $content
                );
            }
            else
            {
                $data = array(
                    'title'     => $title,
                    'date'      => $date,
                    'content'   => $content
                );
            }
            $query = $this->events_model->EditEvent($id,$data);
            $query = $this->events_model->DelTags($id);
            if ($query)
            {
                foreach ($tags as $tag)
                {
                    $query = $this->events_model->AddTag($id,$tag);
                }
            }
            if ($query)
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }
    function del_event()
    {
        if ($this->admin_model->is_logged_in()){
            $query = $this->events_model->DelEvent($this->input->post('id'));
            if ($query)
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }
    function add_kat()
    {
        if ($this->admin_model->is_logged_in()){
            $title = $this->input->post('title');
            $query = $this->events_model->AddCategory($title);
            if ($query)
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }
}