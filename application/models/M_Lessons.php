<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Lessons extends CI_Model
{
    private $table = 'lessons';

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

    // GET semua data lesson dengan JOIN ke courses
    public function get_all()
    {
        return $this->db
            ->select('lessons.*, courses.judul as judul_course, courses.slug as slug_course')
            ->from('lessons')
            ->join('courses', 'courses.id = lessons.course_id')
            ->order_by('lessons.course_id', 'ASC')
            ->order_by('lessons.urutan', 'ASC')
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

    // CEK slug unik
    public function is_slug_exist($slug, $id = null)
    {
        $this->db->where('slug', $slug);

        if ($id != null) {
            $this->db->where('id !=', $id);
        }

        return $this->db->get($this->table)->num_rows() > 0;
    }
}
