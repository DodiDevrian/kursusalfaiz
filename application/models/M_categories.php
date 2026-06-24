<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categories extends CI_Model
{
    private $table = 'categories';

    // INSERT data baru
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // UPDATE data
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    // GET semua data kategori
    public function get_all()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result();
    }

    // GET data by ID
    public function get_by_id($id)
    {
        return $this->db
            ->get_where($this->table, ['id' => $id])
            ->row();
    }

    // DELETE data
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }
}
