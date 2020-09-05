<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dokumen');
		if (!$this->session->userdata('nik')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['session'] = $this->session->all_userdata();
		$data['dokumen'] = $this->m_dokumen->get_data();
		//$this->load->view('dokumen',$data);
		$data['pegawai'] = $this->m_dokumen->get_pegawai();
		$data['tampilan'] = 'dokumen';
		$this->load->view('template/media', $data);
	}

	public function tambah()
	{
		$data['tampilan'] = 'tambah-dokumen';
		$this->load->view('template/media', $data);
	}

	public function edit($id_dokumen)
	{
		$data['edit'] = $this->m_dokumen->get_data_edit($id_dokumen);
		$this->load->view('edit', $data);
	}
	//edit ajak
	public function edit_ajak()
	{
		$edit = $this->m_dokumen->get_data_edit_ajak();
		$data = json_encode($edit);
		echo $data;
	}

	public function simpan()
	{

		/* METHOD UPLOAD FILE */

		$config = array(
			'upload_path'   => './upload/dokumen/',
			'allowed_types' => 'jpg|jpeg|png|pdf|docx|doc',
			'max_size'		=> '50000',
			'overwrite'     => 1
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {

			$dt = array('upload_data' => $this->upload->data());

			$berkas = $dt['upload_data']['file_name'];

			if (empty($this->input->post('id_dokumen'))) {
				$aksi = $this->m_dokumen->simpan($berkas);
				if ($aksi) {
					$this->session->set_flashdata('berhasil', 'Data dokumen Berhasil Disimpan');
					redirect('pegawai/dokumen');
				} else {
					$this->session->set_flashdata('gagal', 'Data dokumen Gagal Disimpan');
					redirect('pegawai/dokumen');
				}
			} else {
				$aksi = $this->m_dokumen->ubah($berkas);
				if ($aksi) {
					$this->session->set_flashdata('berhasil', 'Data dokumen Berhasil Diubah');
					redirect('pegawai/dokumen');
				} else {
					$this->session->set_flashdata('gagal', 'Data dokumen Tidak Berhasil Diubah');
					redirect('pegawai/dokumen');
				}
			}
		} else {
			$aksi = $this->m_dokumen->simpan_berkas();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data dokumen tanpa file berhasil disimpan');
				redirect('pegawai/dokumen');
			} else {
				$this->session->set_flashdata('gagal', 'Data dokumen tanpa file tidak berhasil disimpan');
				redirect('pegawai/dokumen');
			}
		}
	}

	public function hapus($id_dokumen)
	{
		$aksi = $this->m_dokumen->delete($id_dokumen);
		if ($aksi) {
			$this->session->set_flashdata('berhasil', 'Data dokumen Berhasil Dihapus');
			redirect('pegawai/dokumen');
		} else {
			$this->session->set_flashdata('gagal', 'Data dokumen Tidak Berhasil Dihapus');
			redirect('pegawai/dokumen');
		}
	}
}

/* End of file Dokumen.php */
/* Location: ./application/controllers/Dokumen.php */
