<?php

class Course_detail extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		// $this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_categories');
        $this->load->model('m_courses');
        $this->load->model('m_lessons');
        $this->load->model('m_user');

        if ($this->session->userdata('role')!='user') {
			$this->session->set_flashdata('pesan', 'Anda Belum Melakukan Login, Silahkan Login Terlebih Dahulu!');
			redirect('auth/login');
		}

	}
    
    public function index()
    {
        $data = array(
            'title'   => 'Courses',
            'title2'  => 'Al Faiz',
            'profile'   => $this->m_user->get_all(),
            'courses'   => $this->m_courses->get_all(),
            'lessons'   => $this->m_lessons->get_all($this->session->userdata('id_user')),
            'categories'   => $this->m_categories->get_all(),
            'cek_course' => $this->m_courses->cek_course(),
            'slugurl' => $this->input->get('slug'),
            'isi'     => 'v_course_detail'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);

    }
}