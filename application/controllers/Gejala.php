<?php
defined('BASEPATH') or exit('No direct script access allowed');

class gejala extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['gejala'] = $this->m_gejala->get_data();
		$data['tampilan'] = 'gejala';
		$this->load->view('template/media', $data);
	}

	public function tambah()
	{
		$data['tampilan'] = 'tambah-gejala';
		$this->load->view('template/media', $data);
	}

	public function edit($id_gejala)
	{
		$data['edit'] = $this->m_gejala->get_data_edit($id_gejala);
		$this->load->view('edit', $data);
	}

	public function simpan()
	{
		// if (empty($this->input->post('id_gejala'))) {
			$aksi = $this->m_gejala->simpan();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data gejala Berhasil Disimpan');
				redirect('gejala');
			} else {
				$this->session->set_flashdata('gagal', 'Data gejala Gagal Disimpan');
				redirect('gejala');
			}
		// } else {
		// 	$aksi = $this->m_gejala->ubah();
		// 	if ($aksi) {
		// 		$this->session->set_flashdata('berhasil', 'Data gejala Berhasil Diubah');
		// 		redirect('gejala');
		// 	} else {
		// 		$this->session->set_flashdata('gagal', 'Data gejala Tidak Berhasil Diubah');
		// 		redirect('gejala');
		// 	}
		// }
	}
	public function ubah()
	{
			$aksi = $this->m_gejala->ubah();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data gejala Berhasil Diubah');
				redirect('gejala');
			} else {
				$this->session->set_flashdata('gagal', 'Data gejala Tidak Berhasil Diubah');
				redirect('gejala');
			}
	}
	public function hapus($id_gejala)
	{
		$aksi = $this->m_gejala->delete($id_gejala);
		if ($aksi) {
			$this->session->set_flashdata('berhasil', 'Data gejala Berhasil Dihapus');
			redirect('gejala');
		} else {
			$this->session->set_flashdata('gagal', 'Data gejala Tidak Berhasil Dihapus');
			redirect('gejala');
		}
	}
}

/* End of file gejala.php */
/* Location: ./application/controllers/gejala.php */