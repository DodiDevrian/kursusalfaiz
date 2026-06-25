<?php

class Courses extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		// $this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_categories');
        $this->load->model('m_courses');
        $this->load->model('m_user');
	}
    
    public function index()
    {
        $data = array(
            'title'   => 'Courses',
            'title2'  => 'Al Faiz',
            'categories'   => $this->m_categories->get_all(),
            'courses'   => $this->m_courses->get_all(),
            'profile'   => $this->m_user->get_all(),
            'isi'     => 'v_courses'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);

    }
}