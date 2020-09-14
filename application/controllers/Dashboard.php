<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['tampilan'] = 'dashboard';
		$data['dt_gejala'] = $this->m_dashboard->get_dt_gejala();
		$data['dt_penyakit'] = $this->m_dashboard->get_dt_penyakit();
		$data['dt_rule'] = $this->m_dashboard->get_dt_rule();
		$data['dt_pasien'] = $this->m_dashboard->get_dt_pasien();
		$data['dt_check_up'] = $this->m_dashboard->get_dt_check_up();
		$data['dt_check_up_latest'] = $this->m_dashboard->get_dt_check_up_latest();
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
}
 /* End of file Dashboard.php */
 /* Location: ./application/controllers/Dashboard.php */
