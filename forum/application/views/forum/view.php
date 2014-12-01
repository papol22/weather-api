<?php

	if(isset($title)){ $data['title'] = $title; }
	if(isset($post_data)){ $data['post_data'] = $post_data; }

	$data['login'] = $this->session->userdata('is_login');
	$data['user_data'] = $this->session->userdata('user_data');


	$this->load->view('forum/header',$data);
	$this->load->view($view_content ,$data);
	$this->load->view('forum/footer',$data);