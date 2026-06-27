<?php

class M_faq extends CI_Model{

    public function get_all()
    {
        return $this->db->get('faqs')->result();
    }

    public function insert($data){
        $this->db->insert('faqs', $data);
    }

    public function delete($id){
        $this->db->delete('faqs', array('id' => $id));
    }

    public function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update('faqs', $data);
    }

    public function get_by_id($id){
        return $this->db->get_where('faqs', array('id' => $id))->row();
    }
}
