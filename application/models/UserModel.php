<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function login($data)
    {

        $query = $this->db->get_where('users', $data);
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function getResID($data)
    {
        $this->db->where('firstname', $data['fname']);
        $this->db->where('middlename', $data['mname']);
        $this->db->where('lastname', $data['lname']);
        $query = $this->db->get('residents');
        return $query->row();
    }

    public function checkUserEmail($email)
    {
        $this->db->where('email', $email);

        $query = $this->db->get('users');

        return $query->row();
    }
    
    public function checkOTPCode($otp_code)
    {
        $this->db->where('otp', $otp_code);

        $query = $this->db->get('users');

        return $query->row();
    }

    public function getUsers()
    {
        $this->db->where_not_in('username', $this->session->username);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function save($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update('users', $data, 'id=' . $id);
        return $this->db->affected_rows();
    }

    public function updateresPas($data, $id)
    {
        $this->db->update('users', $data, 'resident_id=' . $id);
        return $this->db->affected_rows();
    }

    public function updateOTP($data, $email)
    {
        $this->db->update('users', $data, "email='" . $email . "'");
        
        return $this->db->affected_rows();
    }

    public function createSecurity($data)
    {
        $this->db->insert('security_question', $data);
        return $this->db->affected_rows();
    }

    public function updateSecurity($data, $username)
    {
        $this->db->update('security_question', $data, 'username=' . $username);
        return $this->db->affected_rows();
    }

    public function checkUser($id)
    {
        $this->db->where('resident_id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function checkSecurity($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('security_question');
        return $query->num_rows();
    }

    public function matchsecurity($data)
    {
        $this->db->where($data);
        $query = $this->db->get('security_question');
        return $query->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }
}
