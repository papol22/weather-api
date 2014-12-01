<?php
	
	class User_model extends CI_Model {

		function go_login(){

			$where = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);

			$query = $this->db->get_where('user', $where);
			
			if ($query->num_rows() == 1) 
			{
				return $query->row_array();
			}

		}

		function go_register(){
			
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('cpassword')),
			);

			$insert = $this->db->insert('user', $data);
			return $insert;

		}




	}