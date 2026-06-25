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
        if ($this->session->userdata('role')!='user') {
			$this->session->set_flashdata('pesan', 'Anda Belum Melakukan Login, Silahkan Login Terlebih Dahulu!');
			redirect('auth/login');
		}
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

    public function change_password()
    {
        // Ensure user is logged in
        $id_user = $this->session->userdata('id_user');
        if (!$id_user) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Anda harus login terlebih dahulu.'
            ]);
            return;
        }

        $old_pass = $this->input->post('old_password');
        $new_pass = $this->input->post('new_password');
        $confirm_pass = $this->input->post('confirm_new_password');

        if (empty($old_pass) || empty($new_pass) || empty($confirm_pass)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Semua kolom kata sandi wajib diisi.'
            ]);
            return;
        }

        if ($new_pass !== $confirm_pass) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Konfirmasi kata sandi tidak cocok.'
            ]);
            return;
        }

        if (strlen($new_pass) < 6) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Kata sandi baru minimal 6 karakter.'
            ]);
            return;
        }

        // Fetch user data
        $user = $this->m_user->get_user($id_user);
        if (!$user) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Pengguna tidak ditemukan.'
            ]);
            return;
        }

        // Verify old password
        if (md5($old_pass) !== $user->password) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Kata sandi lama salah.'
            ]);
            return;
        }

        // Update password
        $update_data = [
            'password' => md5($new_pass)
        ];
        $this->m_user->update_user($id_user, $update_data);

        echo json_encode([
            'status' => 'success',
            'message' => 'Kata sandi berhasil diperbarui!'
        ]);
    }
}