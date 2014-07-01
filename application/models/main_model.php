<?php 
	class Main_model extends CI_model{
		function get_profile($nick){
			$sql = "SELECT * FROM profiles WHERE nick = ?";
			return $this->db->query($sql, $nick);		
		}
	}	
?>