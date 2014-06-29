<?php 
	class Admin_model extends CI_Model {
		function validate($user,$pass){
			$this->db->where('username',$user);
			$pass_encrypted = md5($pass);
			$this->db->where('password',$pass_encrypted);
			$query = $this->db->get('admin');
			if ($query->num_rows == 1)
			{
				$data = array(
					'username_admin'	=> $user,
					'password_admin'	=> $pass_encrypted
				);
				$this->session->set_userdata($data);
				session_start();
				$_SESSION[md5('filemanager')] = true; 
				return true;
			}else{
				return false;
			}
		}
		function is_logged_in(){
			$this->db->where('username',$this->session->userdata('username_admin'));
			$this->db->where('password',$this->session->userdata('password_admin'));
			$query = $this->db->get('admin');
			if ($query->num_rows == 1){
				return true;
			}else{
				return false;
			}
		}
		function change_pass($user,$pass)
		{
			$pass_encrypted = md5($pass);
			$data = array(
				'username_admin' => $user,
				'password_admin' => $pass_encrypted
			);
			$this->db->where('username',$this->session->userdata('username'));
			$query = $this->db->update('admin', $data); 
			return $query;
		}
	}
 ?>