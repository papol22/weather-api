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
		$config['max_size']	= '1000';
		$config['max_width']  = '1800';
		$config['max_height']  = '1600';

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
				$file = $this->upload->data();
				$config1['image_library'] = 'gd2';
				$config1['source_image']	= $file['full_path'];
				$config1['new_image'] = 'application/includes/upload/thumb/';
				$config1['create_thumb'] = TRUE;
				$config1['maintain_ratio'] = TRUE;
				$config1['width']	= 150;
				$config1['height']	= 100;
				
				$this->load->library('image_lib', $config1); 
				if ( ! $this->image_lib->resize())
				{
    				$data['error'] = array('error' => $this->image_lib->display_errors());
					$data['view_content'] = 'general/post';
					$data['title'] = 'Posting a New Article in General';
					$this->load->view('forum/view', $data);
				}
				else
				{
					$data['file'] = $file;
					$data['view_content'] = 'general/post';
					$data['title'] = 'Posting a New Article in General';
					$this->load->view('forum/view', $data);
					
				}
			}
		

	}


}