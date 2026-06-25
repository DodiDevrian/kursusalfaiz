<?php

class Register extends CI_Controller{
	public function index(){

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap wajib diisi!']);
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]',[
				'required' => 'Email wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confirm-password]',[
				'required' => 'Password wajib diisi!']);
		$this->form_validation->set_rules('confirm-password', 'Password', 'required|matches[password]',[
				'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_register');
		}else {
			$data = array(
				'id_user'		=> '',
				'nama'		=> $this->input->post('nama'),
				'email'		=> $this->input->post('email'),
				'password'		=> md5($this->input->post('password')),
				'role'			=> 'user',
				'status'		=> 'aktif',
			);

			$this->db->insert('users', $data);
			$this->session->set_flashdata('pesan', 'Akun Berhasil Dibuat! Silahkan Login!');
			redirect('auth/login');
		}

	}
}