<?php

class Bookmark extends CI_Controller
{
    public function __construct(){
		parent ::__construct();
        $this->load->model('m_user');
        $this->load->helpers('text');
        $this->load->model('m_categories');
        $this->load->model('m_courses');
        $this->load->model('m_lessons');

        if ($this->session->userdata('role')!='user') {
			$this->session->set_flashdata('pesan', 'Anda Belum Melakukan Login, Silahkan Login Terlebih Dahulu!');
			redirect('auth/login');
		}

	}
    
    public function index()
    {
        $data = array(
            'title'                 => 'Bookmark',
            'title2'                => 'Al Faiz',
            'profile'               => $this->m_user->get_all(),
            'isi'           => 'v_bookmark'
        );
        $this->load->view('layout_dash/v_wrapper', $data, FALSE);
    }
}  