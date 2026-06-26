<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_comments extends CI_Model
{
    private $table = 'comments';

    // Get all comments for a lesson, joined with user info
    public function get_lesson_comments($lesson_id)
    {
        return $this->db
            ->select('comments.*, users.nama, users.foto, users.role, lessons.judul')
            ->from($this->table)
            ->join('users', 'users.id_user = comments.user_id')
            ->join('lessons', 'lessons.id = comments.lesson_id')
            ->where('comments.lesson_id', $lesson_id)
            ->order_by('comments.created_at', 'ASC')
            ->get()
            ->result();
    }

    public function get_all()
    {
        return $this->db
            ->select('comments.*, users.nama, users.foto, users.role, lessons.judul')
            ->from($this->table)
            ->join('users', 'users.id_user = comments.user_id')
            ->join('lessons', 'lessons.id = comments.lesson_id')
            ->order_by('comments.created_at', 'ASC')
            ->get()
            ->result();
    }

    // Insert a new comment/reply
    public function insert_comment($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Delete a comment
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    public function delete_comment($id)
    {
        return $this->delete($id);
    }
}
