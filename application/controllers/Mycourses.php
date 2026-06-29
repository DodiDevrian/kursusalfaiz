<?php

class Mycourses extends CI_Controller
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
        if ($this->session->userdata('role') != 'user') {
            $this->session->set_flashdata('pesan', 'Anda Belum Melakukan Login, Silahkan Login Terlebih Dahulu!');
            redirect('auth/login');
        }

        $id_user = $this->session->userdata('id_user') ? $this->session->userdata('id_user') : 2;

        $my_progress = $this->db
            ->select('course_progress.*, courses.judul, courses.slug, courses.deskripsi, courses.thumbnail, categories.nama_kategori')
            ->from('course_progress')
            ->join('courses', 'courses.id = course_progress.course_id')
            ->join('categories', 'categories.id = courses.category_id')
            ->where('course_progress.user_id', $id_user)
            ->get()
            ->result();

        $ongoing_courses = [];
        $completed_courses = [];

        foreach ($my_progress as $row) {
            if ($row->progress < 100) {
                $ongoing_courses[] = $row;
            } else {
                $completed_courses[] = $row;
            }
        }

        $data = array(
            'title'             => 'Courses',
            'title2'            => 'Al Faiz',
            'profile'           => $this->m_user->get_all(),
            'ongoing_courses'   => $ongoing_courses,
            'completed_courses' => $completed_courses,
            'isi'               => 'v_mycourses'
        );
        $this->load->view('layout_dash/v_wrapper', $data, FALSE);
    }
}