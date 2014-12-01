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



	public function do_upload(){		
		$config['upload_path'] = 'application/includes/upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);


			if (!$this->upload->do_upload())
			{
				// var_dump(is_dir('application/includes/upload'));
				$data['error'] = array('error' => $this->upload->display_errors());
				$data['view_content'] = 'general/post';
				$data['title'] = 'Posting a New Article in General';
				$this->load->view('forum/view', $data);
			}
			else
			{
				$data['file'] = $this->upload->data();
				$data['view_content'] = 'general/post';
				$data['title'] = 'Posting a New Article in General';
				$this->load->view('forum/view', $data);
			}
		

	}


}