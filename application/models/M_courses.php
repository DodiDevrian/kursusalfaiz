<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_courses extends CI_Model
{
    private $table = 'courses';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

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

    public function get_3(){
        return $this->db
            ->select('courses.*, categories.nama_kategori')
            ->from('courses')
            ->join('categories', 'categories.id = courses.category_id')
            ->order_by('courses.id', 'DESC')
            ->limit(3)
            ->get()
            ->result();
    }

    // public function get_3_popular(){
    //     return $this->db
    //         ->select('courses.*, categories.nama_kategori')
    //         ->from('courses')
    //         ->join('categories', 'categories.id = courses.category_id')
    //         ->order_by('courses.id', 'DESC')
    //         ->limit(3)
    //         ->get()
    //         ->result();
    // }

    public function cek_course()
    {
        return $this->db
            ->select('course_progress.*, courses.judul')
            ->from('course_progress')
            ->join('courses', 'courses.id = course_progress.course_id')
            ->order_by('course_progress.id', 'DESC')
            ->get()
            ->result();
    }


    public function get_by_id($id)
    {
        return $this->db
            ->get_where($this->table, ['id' => $id])
            ->row();
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    public function is_slug_exist($slug, $id = null)
    {
        $this->db->where('slug', $slug);

        if ($id != null) {
            $this->db->where('id !=', $id);
        }

        return $this->db->get($this->table)->num_rows() > 0;
    }
}