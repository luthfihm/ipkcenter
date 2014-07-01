<?php 
class Main extends CI_Controller{

	function _construct()
	{
		parent::__construct();
		$this->load->model('modeldata');
	}

	function index()
	{
		$isi['title'] = "IPKC Infrastructure Partnership Knowledge Center";
		$isi['view'] = "home";
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

}
?>