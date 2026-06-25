<?php

class Categories extends CI_Controller
{

    public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('m_categories');

        if ($this->session->userdata('role')!='admin') {
			$this->session->set_flashdata('pesan', 'Halaman ini hanya dapat diakses oleh admin, silahkan lakukan login admin!');
			redirect('auth/login');
		}
	}

    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'title2' => 'Categories',
            'categories' => $this->m_categories->get_all(),
            'isi'   => 'admin/v_categories'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function simpan(){

        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'slug' => $this->input->post('slug'),
            'icon' => $this->input->post('icon')
        );
        $this->m_categories->insert($data);

        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Ditambahkan!');
        redirect('admin/categories');
    }

    public function delete($id)
    {
        $this->m_categories->delete($id);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Dihapus!');
        redirect('admin/categories');
    }
}