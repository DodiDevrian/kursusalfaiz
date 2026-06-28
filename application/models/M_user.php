<?php

class M_user extends CI_Model{

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('users', $data);
    }

    public function update_status($id, $status)
    {
        $this->db->where('id_user', $id);
        $this->db->update('users', array('status' => $status));
    }

    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }

    public function get_3()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id_user', 'desc');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

}