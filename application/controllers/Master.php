<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_master');
		if (!$this->session->userdata('nik')) {
			redirect('login');
		}
	}

	public function golongan()
	{
		$data['session'] = $this->session->all_userdata();
		$data['golongan'] = $this->m_master->get_data_golongan();
		$data['tampilan'] = 'golongan';
		$this->load->view('template/media', $data);
	}

	public function simpangolongan()
	{
		if (empty($this->input->post('id_golongan'))) {
			$aksi = $this->m_master->simpan_golongan();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data Golongan Berhasil Disimpan');
				redirect('master/golongan');
			} else {
				$this->session->set_flashdata('gagal', 'Data Golongan Gagal Disimpan');
				redirect('master/golongan');
			}
		} else {
			$aksi = $this->m_master->ubah_golongan();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data Golongan Berhasil Diubah');
				redirect('master/golongan');
			} else {
				$this->session->set_flashdata('berhasil', 'Data Golongan Tidak Berhasil Diubah');
				redirect('master/golongan');
			}
		}
	}

	public function hapusgolongan($id_golongan)
	{
		$aksi = $this->m_master->delete_golongan($id_golongan);
		if ($aksi) {
			$this->session->set_flashdata('berhasil', 'Data Golongan Berhasil Dihapus');
			redirect('master/golongan');
		} else {
			$this->session->set_flashdata('gagal', 'Data Golongan Tidak Berhasil Dihapus');
			redirect('master/golongan');
		}
	}

	public function jabatan()
	{
		$data['session'] = $this->session->all_userdata();
		$data['jabatan'] = $this->m_master->get_data();
		$data['tampilan'] = 'jabatan';
		$this->load->view('template/media', $data);
	}

	public function simpanjabatan()
	{
		if (empty($this->input->post('id_jabatan'))) {
			$aksi = $this->m_master->simpan();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data Jabatan Berhasil Disimpan');
				redirect('master/jabatan');
			} else {
				$this->session->set_flashdata('gagal', 'Data Jabatan Gagal Disimpan');
				redirect('master/jabatan');
			}
		} else {
			$aksi = $this->m_master->ubah();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data Jabatan Berhasil Diubah');
				redirect('master/jabatan');
			} else {
				$this->session->set_flashdata('berhasil', 'Data Jabatan Tidak Berhasil Diubah');
				redirect('master/jabatan');
			}
		}
	}

	public function hapusjabatan($id_jabatan)
	{
		$aksi = $this->m_master->delete($id_jabatan);
		if ($aksi) {
			$this->session->set_flashdata('berhasil', 'Data Jabatan Berhasil Dihapus');
			redirect('master/jabatan');
		} else {
			$this->session->set_flashdata('gagal', 'Data Jabatan Tidak Berhasil Dihapus');
			redirect('master/jabatan');
		}
	}
}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */