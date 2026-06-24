<?php

class Register extends CI_Controller{
	public function index(){

		$this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap wajib diisi!']);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',[
				'required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]',[
				'required' => 'Password wajib diisi!']);
		$this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]',[
				'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_register');
		}else {
			$data = array(
				'id_user'		=> '',
				'nama_user'		=> $this->input->post('nama_user'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password_1'),
				'role'			=> 2
			);

			$this->db->insert('user', $data);
			$this->session->set_flashdata('pesan', 'Akun Berhasil Dibuat!');
			redirect('auth/login');
		}

	}
}