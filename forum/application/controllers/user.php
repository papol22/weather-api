<?php
	/**
	* 
	*/
	class User extends CI_Controller
	{
		

		function login()
		{
			$data['view_content'] = 'user/login_form';
			$this->load->view('forum/view', $data);
		}


		function confirm_login()
		{

			$this->load->model('user_model');
			$query = $this->user_model->go_login();

			if ($query)
			{
	

				$data['user_data'] = $query;
				$data['is_login'] = true;

				$this->session->set_userdata($data);
				redirect(forum/home);
			}
			else
			{
				$this->login();
			}
	
		}


		function register()
		{
			$data['view_content'] = 'user/register_form';
			$this->load->view('forum/view', $data);
		}


		function confirm_register()
		{



			$this->load->library('form_validation');
			$rules = array(
						array(
							'field' => 'name',
							'label' => 'Full Name',
							'rules' => 'trim|required|min_length[6]|max_length[40]',
						),
						array(
							'field' => 'email',
							'label' => 'Email Address',
							'rules' => 'trim|required|valid_email|is_unique[user.email]',
						),
						array(
							'field' => 'username',
							'label' => 'Username',
							'rules' => 'trim|required|min_length[6]|max_length[40]|is_unique[user.username]',
						),
						array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required|min_length[6]|max_length[40]',
						),
						array(
							'field' => 'cpassword',
							'label' => 'Confirm Password',
							'rules' => 'trim|required|matches[password]',
						),
					);

			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == FALSE)
			{
				$this->register();
			}
			else
			{
				$this->load->model('user_model');
				if($query = $this->user_model->go_register())
				{
					redirect(forum/home);
				}
				else
				{
					$this->register();
				}
			}

		}






	}