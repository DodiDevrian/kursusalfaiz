<?php

class Dashboard extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		// $this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_categories');
        $this->load->model('m_courses');
        $this->load->model('m_lessons');
        $this->load->model('m_user');

	}
    
    public function index()
    {
        $this->load->model('m_comments');
        $id_user = $this->session->userdata('id_user') ? $this->session->userdata('id_user') : 2;
        $user_comments = $this->m_comments->get_user_comments($id_user, 3);
        
        $latest_progress = $this->m_courses->get_latest_course_progress($id_user);
        $recent_course = null;
        $recent_lesson = null;
        $recent_course_progress = 0;

        if ($latest_progress) {
            $recent_course = $latest_progress['course'];
            $recent_lesson = $latest_progress['lesson'];
            $recent_course_progress = round($recent_course->course_progress);
        }

        $data = array(
            'title'   => 'Courses',
            'title2'  => 'Al Faiz',
            'profile'   => $this->m_user->get_all(),
            'courses'   => $this->m_courses->get_all(),
            'lessons'   => $this->m_lessons->get_all(),
            'categories'   => $this->m_categories->get_all(),
            'slugurl' => $this->input->get('slug'),
            'lesson_done' => $this->m_lessons->get_all(),
            'course_progress' => $this->m_courses->get_all_progress(),
            'user_comments' => $user_comments,
            'recent_course' => $recent_course,
            'recent_lesson' => $recent_lesson,
            'recent_course_progress' => $recent_course_progress,
            'isi' => 'v_dashboard'
        );
        $this->load->view('layout_dash/v_wrapper', $data, FALSE);

    }
}