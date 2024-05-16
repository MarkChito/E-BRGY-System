<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RequestModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function transactions($id = '')
    {
        if ($id) {
            $this->db->select('*, request.status as status, request.id as req_id, ');

            $this->db->from('request');
            $this->db->join('services', 'services.id=request.service_id');
            $this->db->where('request.resident_id', $id);
            $this->db->order_by('request.date', 'DESC');
            $query = $this->db->get();
        } else {
            $this->db->select('*, request.status as status, request.id as req_id, residents.id as res_id');

            $this->db->from('request');
            $this->db->join('services', 'services.id=request.service_id');
            $this->db->join('residents', 'residents.id=request.resident_id');
            $this->db->order_by('request.date', 'DESC');
            $query = $this->db->get();
        }

        return $query->result_array();
    }

    public function getReq()
    {
        $this->db->select('*, request.status as status, request.id as req_id, residents.id as res_id');

        $this->db->from('request');
        $this->db->join('services', 'services.id=request.service_id');
        $this->db->join('residents', 'residents.id=request.resident_id');
        $this->db->order_by('request.id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getReqCount()
    {
        $this->db->where('request_stat', 0);
        $query = $this->db->get('request');

        return $query->num_rows();
    }

    public function save($data)
    {
        $this->db->insert('request', $data);
        return $this->db->affected_rows();
    }

    public function update_req($data, $id)
    {
        $this->db->update('request', $data, "id=" . $id);
        return $this->db->affected_rows();
    }
    public function update_stat()
    {
        $this->db->set('request_stat', 1);
        $this->db->where('request_stat', 0);
        $this->db->update('request');
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('request');
        return $this->db->affected_rows();
    }
}
