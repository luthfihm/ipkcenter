<?php 
	class Main_model extends CI_model{
		function get_profile($nick){
			$sql = "SELECT * FROM profiles WHERE nick = ?";
			return $this->db->query($sql, $nick);		
		}

		function get_3_events(){
			return $this->db->query("SELECT * FROM events ORDER BY date DESC LIMIT 3");
		}

		function get_all_events(){
			return $this->db->query("SELECT * FROM events ORDER BY date DESC");
		}

		function get_event($id){
			$sql = "SELECT * FROM events WHERE id = ?";
			return $this->db->query($sql, $id);		
		}
	}	
?>