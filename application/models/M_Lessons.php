<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lessons extends CI_Model
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

    // GET semua data lesson dengan JOIN ke courses dan opsional ke lesson_progress untuk user tertentu
    public function get_all($user_id = null)
    {
        $this->db->select('lessons.*, courses.judul as judul_course, courses.slug as slug_course');
        $this->db->from('lessons');
        $this->db->join('courses', 'courses.id = lessons.course_id');
        
        if ($user_id !== null) {
            $this->db->select('lesson_progress.status as progress_status, lesson_progress.completed_at');
            $this->db->join('lesson_progress', 'lesson_progress.lesson_id = lessons.id AND lesson_progress.user_id = ' . (int)$user_id, 'left');
        }

        return $this->db
            ->order_by('lessons.course_id', 'ASC')
            ->order_by('lessons.urutan', 'ASC')
            ->get()
            ->result();
    }

    // GET lessons dengan progress user tertentu (helper method)
    public function get_lessons_with_progress($user_id)
    {
        return $this->get_all($user_id);
    }

    public function get_bookmarks($user_id)
    {
        return $this->db
            ->select('bookmarks.*, lessons.judul, lessons.slug, courses.judul as judul_course, courses.slug as slug_course')
            ->from('bookmarks')
            ->join('lessons', 'lessons.id = bookmarks.lesson_id')
            ->join('courses', 'courses.id = lessons.course_id')
            ->where('bookmarks.user_id', $user_id)
            ->order_by('bookmarks.id', 'DESC')
            ->get()
            ->result();
    }

    public function delete_bookmark($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('bookmarks');
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
