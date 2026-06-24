<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_courses extends CI_Model
{
    private $table = 'courses';

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

    // GET semua data course
    public function get_all()
    {
        return $this->db
            ->select('courses.*, categories.nama_kategori')
            ->from('courses')
            ->join('categories', 'categories.id = courses.category_id')
            ->order_by('courses.id', 'DESC')
            ->get()
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

    // CEK slug unik (opsional tapi sangat disarankan)
    public function is_slug_exist($slug, $id = null)
    {
        $this->db->where('slug', $slug);

        if ($id != null) {
            $this->db->where('id !=', $id);
        }

        return $this->db->get($this->table)->num_rows() > 0;
    }
}