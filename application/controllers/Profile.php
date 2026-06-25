<?php

class Profile extends CI_Controller
{
    public function __construct(){
		parent ::__construct();
        $this->load->model('m_user');

		// $this->load->helpers(['menuAktif']);
		// $this->load->helpers('text');

        // $this->load->model('m_home');
        // $this->load->model('m_kursus');
        // $this->load->model('m_asprak');
	}
    
    public function index()
    {
        $data = array(
            'title'                 => 'Profile',
            'title2'                => 'Al Faiz',
            'profile'               => $this->m_user->get_all(),
            'isi' => 'v_profile'
        );
        $this->load->view('layout_dash/v_wrapper', $data, FALSE);
    }

    public function update($id_user)
    {
        $data = array(
            'id_user'        => $id_user,
            'nama'      => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'foto'      => $this->input->post('foto'),
        );

        $this->m_user->update_user($id_user, $data);
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate');
        redirect('profile');
    }
}