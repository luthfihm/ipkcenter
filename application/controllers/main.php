<?php 
class Main extends CI_Controller{

	function _construct()
	{
		parent::__construct();
		$this->load->model('modeldata');
	}

	function index()
	{
		$this->load->model('main_model','',TRUE);
		$data['events'] = $this->main_model->get_3_events();

		$isi['title'] = "IPKC Infrastructure Partnership Knowledge Center";
		$isi['view'] = "home";
		$isi['data'] = $data;
		$this->load->view('template',$isi);
	}

	function about()
	{
		$isi['title'] = "About IPKC";
		$isi['view'] = "about";
		$this->load->view('template2', $isi);
	}

	function profiles()
	{
		$isi['title'] = "Profiles IPKC";
		$isi['view'] = "profiles";
		$this->load->view('template2', $isi);	
	}

	function detail_profile($nama)
	{
		$this->load->model('main_model','',TRUE);
		$profile = $this->main_model->get_profile($nama);
		$data['teks'] = $profile;

		$isi['data'] = $data;
		foreach ($profile->result() as $row) {
			$isi['title'] = $row->name;
		}

		$isi['view'] = "detail_profile";
		$this->load->view('template2', $isi);
	}

	function events(){
		$this->load->model('main_model','',TRUE);
		$data['events'] = $this->main_model->get_all_events();

		$isi['title'] = "IPKC Infrastructure Partnership Knowledge Center";
		$isi['view'] = "events";
		$isi['data'] = $data;
		$this->load->view('template2',$isi);
	}

	function detail_event($id)
	{
		$this->load->model('main_model','',TRUE);
		$event = $this->main_model->get_event($id);
		$data['event'] = $event;

		$isi['data'] = $data;
		foreach ($event->result() as $row) {
			$isi['title'] = $row->title;	
		}

		$isi['view'] = 'detail_event';
		$this->load->view('template2', $isi);		
	}

	function repo($dir = 'source/repo')
	{
		// if ($dir == null){
		// 	$dir = 'source/repo';	
		// }
        $this->load->helper('directory');
		$isi['title'] = "Repository";
		$isi['view'] = "repo";
        
        $isi['dir'] = $dir;
        $isi['files'] = directory_map('./'.$dir.'/',1);
		$this->load->view('template2', $isi);
	}

}
?>