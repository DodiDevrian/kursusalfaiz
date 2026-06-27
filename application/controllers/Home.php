<?php

class Home extends CI_Controller
{
    public function __construct(){
		parent ::__construct();
        $this->load->model('m_courses');
        $this->load->model('m_user');
        $this->load->model('m_faq');
		// $this->load->helpers(['menuAktif']);
		// $this->load->helpers('text');

        // $this->load->model('m_home');
        // $this->load->model('m_kursus');
        // $this->load->model('m_asprak');
	}
    
    public function index()
    {
        $data = array(
            'title'                 => 'Kursus Online',
            'title2'                => 'Belajar Gratis',
            'get3'        => $this->m_courses->get_3(),
            'profile'               => $this->m_user->get_all(),
            'faq' => $this->m_faq->get_all(),
            'isi'                   => 'v_home'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}