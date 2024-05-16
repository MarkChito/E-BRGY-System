<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnouncementModel extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function getAnnouncement(){
        $query = $this->db->get('announcement');
        return $query->result_array();
    }

    public function save($data){
        $this->db->insert('announcement',$data);
        return $this->db->affected_rows();
    }

    public function update($data,$id){
        $this->db->update('announcement',$data, "id=".$id);
        return $this->db->affected_rows();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('announcement');
        return $this->db->affected_rows();
    }

}
?>