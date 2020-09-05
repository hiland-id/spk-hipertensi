<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
		$this->load->model('m_user');
		if (!$this->session->userdata('nik')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['tampilan'] = 'dashboard';
		$this->load->view('template/media', $data);
	}
	public function profil()
	{
		$data['session'] = $this->session->all_userdata();
		$nik = $this->session->userdata('nik');
		$data['dt_user'] = $this->m_user->get_data_detail($nik);
		$data['tampilan'] = 'profil';
		$this->load->view('template/media', $data);
	}

	public function ubah_password()
	{
		$data['session'] = $this->session->all_userdata();
		$data['tampilan'] = 'ubah_password';
		$this->load->view('template/media', $data);
	}

	public function aksi_ubah_password()
	{
		$q = $this->m_dashboard->aksi_ubah_password_query();
		if ($q) {
			$this->session->set_flashdata('berhasil', 'Ubah password berhasil silahkan login ulang.');
			redirect('dashboard/ubah_password');
		} else {
			$this->session->set_flashdata('gagal', 'Ubah password tidak berhasil silahkan untuk mencoba kembali.');
			redirect('dashboard/ubah_password');
		}
	}

	public function get_data_golongan()
	{
		$q_gol_1_a = $this->m_dashboard->q_gol_1_a();
		$q_gol_1_b = $this->m_dashboard->q_gol_1_b();
		$q_gol_1_c = $this->m_dashboard->q_gol_1_c();
		$q_gol_1_d = $this->m_dashboard->q_gol_1_d();

		$q_gol_2_a = $this->m_dashboard->q_gol_2_a();
		$q_gol_2_b = $this->m_dashboard->q_gol_2_b();
		$q_gol_2_c = $this->m_dashboard->q_gol_2_c();
		$q_gol_2_d = $this->m_dashboard->q_gol_2_d();

		$q_gol_3_a = $this->m_dashboard->q_gol_3_a();
		$q_gol_3_b = $this->m_dashboard->q_gol_3_b();
		$q_gol_3_c = $this->m_dashboard->q_gol_3_c();
		$q_gol_3_d = $this->m_dashboard->q_gol_3_d();

		$q_gol_4_a = $this->m_dashboard->q_gol_4_a();
		$q_gol_4_b = $this->m_dashboard->q_gol_4_b();
		$q_gol_4_c = $this->m_dashboard->q_gol_4_c();
		$q_gol_4_d = $this->m_dashboard->q_gol_4_d();
		$q_gol_4_e = $this->m_dashboard->q_gol_4_e();

		$json['gol_1'] = array(
			'a' => $q_gol_1_a,
			'b' => $q_gol_1_b,
			'c' => $q_gol_1_c,
			'd' => $q_gol_1_d
		);

		$json['gol_2'] = array(
			'a' => $q_gol_2_a,
			'b' => $q_gol_2_b,
			'c' => $q_gol_2_c,
			'd' => $q_gol_2_d
		);

		$json['gol_3'] = array(
			'a' => $q_gol_3_a,
			'b' => $q_gol_3_b,
			'c' => $q_gol_3_c,
			'd' => $q_gol_3_d
		);

		$json['gol_4'] = array(
			'a' => $q_gol_4_a,
			'b' => $q_gol_4_b,
			'c' => $q_gol_4_c,
			'd' => $q_gol_4_d,
			'e' => $q_gol_4_e
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
}
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */
