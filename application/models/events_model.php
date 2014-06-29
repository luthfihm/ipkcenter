<?php 
	class Events_model extends CI_Model {
		function AddEvent($data)
        {
            $query = $this->db->insert('events',$data);
            return $query;
        }
        function AddCategory($title)
        {
            $query = $this->db->insert('category',array('title' => $title));
            return $query;
        }
        function AddTag($id,$tag)
        {
            $data = array(
                'id'    => $id,
                'tag'   => $tag
            );
            $query = $this->db->insert('tags',$data);
            return $query;
        }
        function GetLastEvent()
        {
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            $query = $this->db->get('events');
            return $query->row()->id;
        }
        function GetLastCategory()
        {
            $this->db->order_by('id_kat','desc');
            $this->db->limit(1);
            $query = $this->db->get('category');
            return $query->row()->id_kat;
        }
        function GetListCategory()
        {
            $query = $this->db->get('category');
            return $query->result();
        }
	}
 ?>