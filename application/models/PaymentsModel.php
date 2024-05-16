<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentsModel extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function getPayments(){
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get('payments');
        return $query->result_array();
    }

    public function getDailyTrans(){
        $this->db->where('DATE(created_at)', date('Y-m-d'));
        $query = $this->db->get('payments');
        return $query->result_array();
    }

    public function save($data){
        $this->db->insert('payments',$data);
        return $this->db->affected_rows();
    }
}
?>