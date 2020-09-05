<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dokumen extends CI_Model
{

	public function get_data()
	{
		$this->db->from('dokumen');
		$this->db->join('user', 'user.nik = dokumen.nik', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_user()
	{
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_data_edit($id_dokumen)
	{
		$this->db->from('dokumen');
		$this->db->where('id_dokumen', $id_dokumen);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data_edit_ajak()
	{
		$this->db->from('dokumen');
		$this->db->where('id_dokumen', $this->input->post('id_dokumen'));
		$query = $this->db->get();

		return $query->row();
	}

	public function simpan($berkas)
	{
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama_dokumen' => $this->input->post('nama_dokumen'),
			'type_dokumen' => $this->input->post('type_dokumen'),
			'keterangan' => $berkas
		);
		$query = $this->db->insert('dokumen', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function ubah($berkas)
	{
		if (empty($berkas)) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_dokumen' => $this->input->post('nama_dokumen'),
				'type_dokumen' => $this->input->post('type_dokumen')
			);
		} else {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_dokumen' => $this->input->post('nama_dokumen'),
				'type_dokumen' => $this->input->post('type_dokumen'),
				'keterangan' => $berkas
			);
		}
		$query = $this->db->update('dokumen', $data, array('id_dokumen' => $this->input->post('id_dokumen')));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function simpan_berkas()
	{

		$data = array(
			'nik' => $this->input->post('nik'),
			'nama_dokumen' => $this->input->post('nama_dokumen'),
			'type_dokumen' => $this->input->post('type_dokumen')
		);

		$query = $this->db->insert('dokumen', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id_dokumen)
	{
		$query = $this->db->delete('dokumen', array('id_dokumen' => $id_dokumen));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file M_dokumen.php */
/* Location: ./application/models/M_dokumen.php */