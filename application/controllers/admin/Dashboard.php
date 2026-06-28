<?php

class Dashboard extends CI_Controller
{

    public function __construct(){
		parent ::__construct();
        $this->load->model('m_user');
        $this->load->model('m_courses');
        $this->load->model('m_lessons');
        $this->load->model('m_comments');

		if ($this->session->userdata('role')!='admin') {
			$this->session->set_flashdata('pesan', 'Halaman ini hanya dapat diakses oleh admin, silahkan lakukan login admin!');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'title2' => 'Dashboard',
            'courses'   => $this->m_courses->get_all(),
            'lessons'   => $this->m_lessons->get_all(),
            'alluser'   => $this->m_user->get_all(),
            'allcomments'   => $this->m_comments->get_all(),
            'newuser'   => $this->m_user->get_3(),
            'newcomments'   => $this->m_comments->get_3(),
            'isi'   => 'admin/v_dashboard'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
}
