<?php

class Comments extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_courses');
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
            'title2' => 'Comments',
            'comments' => $this->m_comments->get_all(),
            'isi'   => 'admin/v_comments'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function view_reply(){
        $data = array(
            'title' => 'Admin',
            'title2' => 'Reply Comments',
            'comments' => $this->m_comments->get_all(),
            'balasan' => $this->m_comments->get_all(),
            'reply' => $this->input->get('reply'),
            'isi'   => 'admin/v_ans_comments'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id){
        $this->m_comments->delete($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/comments');
    }
}