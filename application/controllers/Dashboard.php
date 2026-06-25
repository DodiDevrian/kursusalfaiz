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
        $data = array(
            'title'   => 'Courses',
            'title2'  => 'Al Faiz',
            'profile'               => $this->m_user->get_all(),
            'courses'   => $this->m_courses->get_all(),
            'lessons'   => $this->m_lessons->get_all(),
            'categories'   => $this->m_categories->get_all(),
            'slugurl' => $this->input->get('slug'),
            'isi' => 'v_dashboard'
        );
        $this->load->view('layout_dash/v_wrapper', $data, FALSE);

    }
}