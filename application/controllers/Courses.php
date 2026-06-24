<?php

class Courses extends CI_Controller
{
    public function __construct(){
		parent ::__construct();

		// $this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
	}
    
    public function index()
    {
        $data = array(
            'title'   => 'Kursus',
            'title2'  => 'Laboratorium Teknik Informatika',
            // 'kursus'   => $this->m_kursus->lists(),
            'isi'     => 'v_courses'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);

    }
}