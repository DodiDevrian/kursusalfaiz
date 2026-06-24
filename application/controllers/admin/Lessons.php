<?php

class Lessons extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_courses');
        $this->load->model('m_lessons');

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
            'title2' => 'Lessons',
            'courses' => $this->m_courses->get_all(),
            'lessons' => $this->m_lessons->get_all(),
            'isi'   => 'admin/v_lessons'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function simpan()
    {
        // Ambil data dari form
        $id          = $this->input->post('id');
        $course_id   = $this->input->post('course_id');
        $judul       = $this->input->post('judul');
        $slug        = $this->input->post('slug');
        $video_youtube   = $this->input->post('video_youtube');
        $pdf   = $this->input->post('pdf');
        $urutan   = $this->input->post('urutan');
        $deskripsi   = $this->input->post('deskripsi');

        $data = [
            'course_id'   => $course_id,
            'judul'       => $judul,
            'slug'        => $slug,
            'video_youtube' => $video_youtube,
            'pdf'         => $pdf,
            'urutan'      => $urutan,
            'deskripsi'   => $deskripsi
        ];

        // INSERT
        if ($id == '') {

            $data['created_at'] = date('Y-m-d H:i:s');

            $this->db->insert('lessons', $data);

            // redirect setelah simpan
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Ditambahkan!');
            redirect('admin/lessons');

        }
        // UPDATE
        else {

            $this->db->where('id', $id);
            $this->db->update('lessons', $data);

            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diupdate!');
            redirect('admin/lessons');
        }
    }

    public function hapus($id){
        $this->db->where('id', $id);
        $this->db->delete('lessons');

        $this->session->set_flashdata('pesan', 'Data Lessons Berhasil Dihapus!');
        redirect('admin/lessons');
    }
}