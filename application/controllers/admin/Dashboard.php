<?php

class Dashboard extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

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
            // 'count_new'     => $this->m_praktikan->lists(),
            'isi'   => 'admin/v_dashboard'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
}
