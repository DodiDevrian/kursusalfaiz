<?php

class User extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_courses');
        $this->load->model('m_lessons');
        $this->load->model('m_user');

        if ($this->session->userdata('role')!='admin') {
			$this->session->set_flashdata('pesan', 'Halaman ini hanya dapat diakses oleh admin, silahkan lakukan login admin!');
			redirect('auth/login');
		}
    }

    public function index()
    {
        $data = array(
            'title' => 'User',
            'user' => $this->m_user->get_all(),
            'isi' => 'admin/v_user'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function update_status($id, $status)
    {
        $this->m_user->update_status($id, $status);
        $this->session->set_flashdata('pesan', 'Status user berhasil diupdate!');
        redirect('admin/user');
    }
}