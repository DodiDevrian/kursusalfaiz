<?php

class Faq extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_courses');
        $this->load->model('m_faq');

        if ($this->session->userdata('role')!='admin') {
			$this->session->set_flashdata('pesan', 'Halaman ini hanya dapat diakses oleh admin, silahkan lakukan login admin!');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'title2' => 'FAQ',
            'faq' => $this->m_faq->get_all(),
            'isi'   => 'admin/v_faq'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add() {
        $pertanyaan = $this->input->post('pertanyaan');
        $jawaban = $this->input->post('jawaban');

        $this->db->insert('faqs', ['pertanyaan' => $pertanyaan, 'jawaban' => $jawaban]);
        $this->session->set_flashdata('pesan', 'Data FAQ Berhasil Ditambahkan!');
        redirect('admin/faq');
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('faqs');
        $this->session->set_flashdata('pesan', 'Data FAQ Berhasil Dihapus!');
        redirect('admin/faq');
    }

    public function edit($id) {
        $pertanyaan = $this->input->post('pertanyaan');
        $jawaban = $this->input->post('jawaban');

        $this->db->where('id', $id);
        $this->db->update('faqs', ['pertanyaan' => $pertanyaan, 'jawaban' => $jawaban]);
        $this->session->set_flashdata('pesan', 'Data FAQ Berhasil Diupdate!');
        redirect('admin/faq');
    }
}