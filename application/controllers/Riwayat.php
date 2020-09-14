<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['riwayat'] = $this->m_riwayat->get_data();
		$data['tampilan'] = 'list_riwayat';
		$this->load->view('template/media', $data);
	}

	public function hapus($id)
	{
		$query = $this->m_riwayat->hapus_data($id);
		if ($query) {
			$this->session->set_flashdata("berhasil", "Hapus data berhasil");
		} else {
			$this->session->set_flashdata("gagal", "Hapus data tidak berhasil");
		}
		redirect('riwayat');
	}
}

/* End of file Riwayat.php */
/* Location: ./application/controllers/Riwayat.php */
