<?php

class Lesson extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		// $this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_categories');
        $this->load->model('m_courses');
        $this->load->model('m_lessons');
        $this->load->model('m_user');
        $this->load->model('m_comments');

        if ($this->session->userdata('role')=='') {
			$this->session->set_flashdata('pesan', 'Anda Belum Melakukan Login, Silahkan Login Terlebih Dahulu!');
			redirect('auth/login');
		}
	}
    
    public function index()
    {
        $slug = $this->input->get('slug');
        
        // Find current lesson
        $current_lesson = $this->db
            ->select('lessons.*, courses.judul as judul_course, courses.slug as slug_course')
            ->from('lessons')
            ->join('courses', 'courses.id = lessons.course_id')
            ->where('lessons.slug', $slug)
            ->get()
            ->row();

        if (!$current_lesson) {
            show_404();
        }

        $user_id = $this->session->userdata('id_user');

        // Check if course progress record exists
        $course_prog_record = $this->db->get_where('course_progress', [
            'user_id' => $user_id,
            'course_id' => $current_lesson->course_id
        ])->row();

        if (!$course_prog_record) {
            $this->db->insert('course_progress', [
                'user_id' => $user_id,
                'course_id' => $current_lesson->course_id,
                'progress' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        // Check if bookmarked
        $is_bookmarked = $this->db->get_where('bookmarks', [
            'user_id' => $user_id,
            'lesson_id' => $current_lesson->id
        ])->num_rows() > 0;

        // Check if completed
        $is_completed = $this->db->get_where('lesson_progress', [
            'user_id' => $user_id,
            'lesson_id' => $current_lesson->id,
            'status' => 'selesai'
        ])->num_rows() > 0;

        // Get completed lessons list in this course
        $completed_lessons = $this->db
            ->select('lesson_id')
            ->from('lesson_progress')
            ->join('lessons', 'lessons.id = lesson_progress.lesson_id')
            ->where([
                'lesson_progress.user_id' => $user_id,
                'lessons.course_id' => $current_lesson->course_id,
                'lesson_progress.status' => 'selesai'
            ])
            ->get()
            ->result_array();
        
        $completed_ids = array_column($completed_lessons, 'lesson_id');

        // Total lessons in this course
        $total_lessons_count = $this->db->get_where('lessons', ['course_id' => $current_lesson->course_id])->num_rows();

        // Calculate progress percentage
        $progress_percent = 0;
        if ($total_lessons_count > 0) {
            $progress_percent = round((count($completed_ids) / $total_lessons_count) * 100);
        }

        // Fetch lesson comments
        $raw_comments = $this->m_comments->get_lesson_comments($current_lesson->id);
        $comments = [];
        $replies = [];
        foreach ($raw_comments as $c) {
            if ($c->parent_id === null) {
                $comments[$c->id] = $c;
                $comments[$c->id]->replies = [];
            } else {
                $replies[] = $c;
            }
        }
        foreach ($replies as $r) {
            if (isset($comments[$r->parent_id])) {
                $comments[$r->parent_id]->replies[] = $r;
            }
        }

        $data = array(
            'title'   => 'Lesson',
            'title2'  => 'Al Faiz',
            'courses'   => $this->m_courses->get_all(),
            'lessons'   => $this->m_lessons->get_all(),
            'categories'   => $this->m_categories->get_all(),
            'slugurl' => $slug,
            'current_lesson' => $current_lesson,
            'is_bookmarked' => $is_bookmarked,
            'is_completed' => $is_completed,
            'profile' => $this->m_user->get_all(),
            'completed_ids' => $completed_ids,
            'progress_percent' => $progress_percent,
            'comments' => $comments
        );
        $this->load->view('v_lesson', $data, FALSE);
    }

    public function toggle_bookmark()
    {
        $lesson_id = $this->input->post('lesson_id');
        $user_id = $this->session->userdata('id_user');

        $bookmark = $this->db->get_where('bookmarks', [
            'user_id' => $user_id,
            'lesson_id' => $lesson_id
        ])->row();

        if ($bookmark) {
            $this->db->delete('bookmarks', ['id' => $bookmark->id]);
            $status = 'unbookmarked';
        } else {
            $this->db->insert('bookmarks', [
                'user_id' => $user_id,
                'lesson_id' => $lesson_id
            ]);
            $status = 'bookmarked';
        }

        echo json_encode([
            'status' => 'success',
            'action' => $status
        ]);
    }

    public function toggle_complete()
    {
        $lesson_id = $this->input->post('lesson_id');
        $course_id = $this->input->post('course_id');
        $user_id = $this->session->userdata('id_user');

        $progress = $this->db->get_where('lesson_progress', [
            'user_id' => $user_id,
            'lesson_id' => $lesson_id
        ])->row();

        if ($progress) {
            if ($progress->status == 'selesai') {
                $this->db->update('lesson_progress', [
                    'status' => 'belum_selesai',
                    'completed_at' => null
                ], ['id' => $progress->id]);
                $status = 'incomplete';
            } else {
                $this->db->update('lesson_progress', [
                    'status' => 'selesai',
                    'completed_at' => date('Y-m-d H:i:s')
                ], ['id' => $progress->id]);
                $status = 'completed';
            }
        } else {
            $this->db->insert('lesson_progress', [
                'user_id' => $user_id,
                'lesson_id' => $lesson_id,
                'status' => 'selesai',
                'completed_at' => date('Y-m-d H:i:s')
            ]);
            $status = 'completed';
        }

        // Recalculate progress percentage for this course
        $completed_lessons = $this->db
            ->select('lesson_id')
            ->from('lesson_progress')
            ->join('lessons', 'lessons.id = lesson_progress.lesson_id')
            ->where([
                'lesson_progress.user_id' => $user_id,
                'lessons.course_id' => $course_id,
                'lesson_progress.status' => 'selesai'
            ])
            ->get()
            ->num_rows();

        $total_lessons_count = $this->db->get_where('lessons', ['course_id' => $course_id])->num_rows();

        $progress_percent = 0;
        if ($total_lessons_count > 0) {
            $progress_percent = round(($completed_lessons / $total_lessons_count) * 100);
        }

        // Update course_progress table
        $course_prog_record = $this->db->get_where('course_progress', [
            'user_id' => $user_id,
            'course_id' => $course_id
        ])->row();

        if ($course_prog_record) {
            $this->db->update('course_progress', [
                'progress' => $progress_percent,
                'updated_at' => date('Y-m-d H:i:s')
            ], ['id' => $course_prog_record->id]);
        } else {
            $this->db->insert('course_progress', [
                'user_id' => $user_id,
                'course_id' => $course_id,
                'progress' => $progress_percent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        echo json_encode([
            'status' => 'success',
            'action' => $status,
            'progress_percent' => $progress_percent
        ]);
    }

    public function add_comment()
    {
        $user_id = $this->session->userdata('id_user');
        if (!$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'Anda harus login terlebih dahulu.']);
            return;
        }

        $lesson_id = $this->input->post('lesson_id');
        $komentar = $this->input->post('komentar');
        $parent_id = $this->input->post('parent_id');

        if (empty($komentar)) {
            echo json_encode(['status' => 'error', 'message' => 'Komentar tidak boleh kosong.']);
            return;
        }

        $data = [
            'lesson_id' => $lesson_id,
            'user_id' => $user_id,
            'komentar' => $komentar,
            'parent_id' => !empty($parent_id) ? $parent_id : null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->m_comments->insert_comment($data)) {
            echo json_encode(['status' => 'success', 'message' => 'Komentar berhasil dikirim.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengirim komentar.']);
        }
    }
}