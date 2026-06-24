<?php

class Dashboard extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		// $this->load->helpers(['menuAktif']);
		// $this->load->helpers('text');

        // if ($this->session->userdata('role') != 1) {
		// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		// 		Anda Belum Melakukan <strong>Login Sebagai Admin!</strong>
		// 		</div>');
		// 	redirect('auth/login_admin');
		// }
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
