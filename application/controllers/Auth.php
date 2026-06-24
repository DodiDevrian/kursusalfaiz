<?php 

class Auth extends CI_Controller {

	public function __construct(){
		parent ::__construct();

		$this->load->helpers(['menuAktif']);
		$this->load->helpers('text');
        $this->load->model('M_auth');
	}

	public function login(){
			$this->form_validation->set_rules('email', 'Email', 'required',[
				'required' => 'Email wajib diisi!']);
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',[
				'required' => 'Password wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_login');
		}else{
			$auth = $this->M_auth->cek_login();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password</strong> Salah!
				</div>');
				redirect('auth/login');
			}else {
				$this->session->set_userdata('id_user', $auth->id_user);
				$this->session->set_userdata('role', $auth->role);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('foto', $auth->foto);

				switch($auth->role){
					case 'user' : redirect('home');
							break;
                    case 'admin' : redirect('admin/dashboard');
							break;

					default : break;
				}
			}
		}
	}

    public function register()
    {
        $data = array(
            'title' => 'Daftar',
            'isi'   => 'v_register'
        );
        $this->load->view('v_register', $data, FALSE);
    }

    public function logout(){

		$this->session->sess_destroy();
		redirect('auth/login');
	}
}