<?php

class Forum extends CI_Controller {


	function __construct()
	{
		parent::__construct();
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->home();
	}

	public function home(){
		$data['view_content'] = 'forum/home';
		$this->load->view('forum/view', $data);
	}

}