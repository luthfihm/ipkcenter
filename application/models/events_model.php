<?php 
	class Events_model extends CI_Model {
		function AddEvent($data)
        {
            $query = $this->db->insert('events',$data);
            return $query;
        }
        function EditEvent($id,$data)
        {
            $this->db->where("id",$id);
            $query = $this->db->update('events',$data);
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
        function GetEvents($limit,$offset)
        {
            $this->db->order_by("id","desc");
            $this->db->limit($limit,$offset);
            $query = $this->db->get('events');
            return $query->result();
        }
        function GetEventsByKat($kat,$limit,$offset)
        {
            $this->db->where("category",$kat);
            $this->db->order_by("id","desc");
            $this->db->limit($limit,$offset);
            $query = $this->db->get('events');
            return $query->result();
        }
        function GetEventByID($id)
        {
            $this->db->where("id",$id);
            $query = $this->db->get('events');
            return $query->row();
        }
        function NumAll()
        {
            $query = $this->db->get('events');
            return $query->num_rows;
        }
        function NumKat($kat)
        {
            $this->db->where("category",$kat);
            $query = $this->db->get('events');
            return $query->num_rows;
        }
        function NumNull()
        {
            $this->db->where("category",NULL);
            $query = $this->db->get('events');
            return $query->num_rows;
        }
        function GetTags($id)
        {
            $this->db->where("id",$id);
            $query = $this->db->get('tags');
            return $query->result();
        }
        function DelTags($id)
        {
            $this->db->where("id",$id);
            $query = $this->db->delete('tags');
            return $query;
        }
        function IsPageExist($limit,$offset)
        {
            $this->db->limit($limit,$offset);
            $query = $this->db->get('events');
            return ($query->num_rows > 0);
        }
        function IsPageExistKat($kat,$limit,$offset)
        {
            $this->db->where("category",$kat);
            $this->db->limit($limit,$offset);
            $query = $this->db->get('events');
            return ($query->num_rows > 0);
        }
	}
 ?>