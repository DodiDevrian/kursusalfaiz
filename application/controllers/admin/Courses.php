<?php

class Courses extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_courses');

        if ($this->session->userdata('role')!='admin') {
			$this->session->set_flashdata('pesan', 'Halaman ini hanya dapat diakses oleh admin, silahkan lakukan login admin!');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'title2' => 'Courses',
            'courses' => $this->m_courses->get_all(),
            'isi'   => 'admin/v_courses'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function simpan()
    {
        // Ambil data dari form
        $id          = $this->input->post('id');
        $judul       = $this->input->post('judul');
        $slug        = $this->input->post('slug');
        $category_id = $this->input->post('category_id');
        $status      = $this->input->post('status');
        $thumbnail   = $this->input->post('thumbnail');
        $deskripsi   = $this->input->post('deskripsi');

        $data = [
            'judul'       => $judul,
            'slug'        => $slug,
            'category_id' => $category_id,
            'status'      => $status,
            'thumbnail'   => $thumbnail,
            'deskripsi'   => $deskripsi
        ];

        // INSERT
        if ($id == '') {

            $data['created_at'] = date('Y-m-d H:i:s');

            $this->db->insert('courses', $data);

            // redirect setelah simpan
            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Ditambahkan!');
            redirect('admin/courses');

        }
        // UPDATE
        else {

            $this->db->where('id', $id);
            $this->db->update('courses', $data);

            $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Diupdate!');
            redirect('admin/courses');
        }
    }

    public function hapus($id){
        $this->db->where('id', $id);
        $this->db->delete('courses');

        $this->session->set_flashdata('pesan', 'Data Kursus Berhasil Dihapus!');
        redirect('admin/courses');
    }
}
