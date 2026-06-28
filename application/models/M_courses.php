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

    public function get_populer(){
        return $this->db
            ->select('courses.*, categories.nama_kategori')
            ->from('courses')
            ->join('categories', 'categories.id = courses.category_id')
            ->order_by('courses.id', 'ASC')
            ->limit(3)
            ->get()
            ->result();
    }

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

    public function get_latest_course_progress($user_id)
    {
        // 1. Get the course from course_progress ordered by updated_at DESC
        $recent_course = $this->db
            ->select('courses.*, course_progress.progress as course_progress')
            ->from('course_progress')
            ->join('courses', 'courses.id = course_progress.course_id')
            ->where('course_progress.user_id', $user_id)
            ->order_by('course_progress.updated_at', 'DESC')
            ->limit(1)
            ->get()
            ->row();

        if (!$recent_course) {
            return null;
        }

        // 2. Get all lessons for this course ordered by urutan ASC
        $lessons = $this->db
            ->order_by('urutan', 'ASC')
            ->get_where('lessons', ['course_id' => $recent_course->id])
            ->result();

        $recent_lesson = null;
        if (!empty($lessons)) {
            // Get completed lesson IDs
            $completed_progress = $this->db
                ->select('lesson_id')
                ->from('lesson_progress')
                ->join('lessons', 'lessons.id = lesson_progress.lesson_id')
                ->where([
                    'lesson_progress.user_id' => $user_id,
                    'lessons.course_id' => $recent_course->id,
                    'lesson_progress.status' => 'selesai'
                ])
                ->get()
                ->result_array();

            $completed_ids = array_column($completed_progress, 'lesson_id');

            // Find the first uncompleted lesson
            foreach ($lessons as $l) {
                if (!in_array($l->id, $completed_ids)) {
                    $recent_lesson = $l;
                    break;
                }
            }

            // Fallback to the first lesson if all completed
            if (!$recent_lesson) {
                $recent_lesson = $lessons[0];
            }
        }

        return [
            'course' => $recent_course,
            'lesson' => $recent_lesson
        ];
    }

    public function get_all_progress(){
        return $this->db
            ->select('course_progress.*, courses.judul')
            ->from('course_progress')
            ->join('courses', 'courses.id = course_progress.course_id')
            ->order_by('course_progress.id', 'DESC')
            ->get()
            ->result();
    }
}