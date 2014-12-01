<?php
	
	class Post_model extends CI_Model {

		function go_post(){

			$user_data = $this->session->userdata('user_data');
			$data = array(
				'user' => $user_data['id'],
				'title' => $this->input->post('title'),
				'content' => base64_encode($this->input->post('content')),
				'datetime' => now(),
			);

			$insert = $this->db->insert('article', $data);
			return $insert;
		}

		function get_post($id = NULL){
			$where = array(
					'id' => $id
				);

			$query = $this->db->get_where('article', $where);
			return $query->row_array();
		}

	}