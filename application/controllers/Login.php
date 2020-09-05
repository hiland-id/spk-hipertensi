<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('content/login');
	}
	public function cek_login()
	{
		$nik = $this->input->post('nik');
		$password = md5($this->input->post('password'));
		$cekuser = $this->m_login->cek_nik($nik);
		if ($cekuser > 0) {
			$cekpassword = $this->m_login->cek_password($password, $nik);
			if ($cekpassword > 0) {
				$session = $this->m_login->get_data_login($nik);
				$this->session->set_userdata($session);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('gagal', 'Password tidak tepat');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('gagal', 'User tidak terdaftar');
			redirect('login');
		}
	}
	public function logout()
	{
		session_destroy();
		redirect('login');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
