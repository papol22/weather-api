<?php

	class General extends CI_Controller {

		public function introduction(){
			$data['view_content'] = 'general/introduction';
			$this->load->view('forum/view', $data);
		}


		public function article(){

			$config['num_tag_open'] = '<div>';
			$config['num_tag_close'] = '</div>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['base_url'] = base_url().'general/article';
			$config['total_rows'] = $this->db->get('article')->num_rows();
			$config['per_page'] = 15;
			
			$this->pagination->initialize($config);

								$this->db->order_by('id','desc');
			$data['records'] = 	$this->db->get('article', $config['per_page'], $this->uri->segment(3));
			$data['users'] = $this->db->get('user');

			$data['view_content'] = 'general/article';
			$this->load->view('forum/view', $data);
		}



		public function new_article(){

			$data['view_content'] = 'general/post';
			$data['title'] = 'Posting a New Article in General';
			$this->load->view('forum/view', $data);

		}

		public function confirm_post(){

			if(!$this->session->userdata('is_login')){
			$this->article();
			}
			else
			{
			$this->load->library('form_validation');

			$rules = array(
						array(
							'field' => 'title',
							'label' => 'Title',
							'rules' => 'trim|required|min_length[6]|max_length[40]',
						),
						array(
							'field' => 'content',
							'label' => 'Content',
							'rules' => 'required',
						),
					);

			$this->form_validation->set_rules($rules);

				if($this->form_validation->run() == FALSE)
				{
					$this->new_article();
				}
				else
				{
					$this->load->model('post_model');

					if($query = $this->post_model->go_post())
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


		public function view_article($id = NULL){
			$this->load->model('post_model');
			$data['post_data'] = $this->post_model->get_post($id);
			$data['view_content'] = 'general/view';
			$this->load->view('forum/view', $data);
		}


		public function edit_article($id = NULL){

			$this->db->where('id',$id);
			$data['post_data'] = $this->db->get('article');

			print_r($data['post_data']->result_array());

			// $data['view_content'] = 'general/post';
			// $data['title'] = '';
			// $this->load->view('forum/view', $data);
		}



	}