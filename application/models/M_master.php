<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{

	public function get_data_golongan()
	{
		$this->db->from('ref_golongan');
		$query = $this->db->get();
		return $query->result();
	}

	public function simpan_golongan()
	{
		$data = array(
			'id_golongan' => $this->input->post('id_golongan'),
			'nama_golongan' => $this->input->post('nama_golongan')
		);
		$query = $this->db->insert('ref_golongan', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function ubah_golongan()
	{
		$data = array(
			'id_golongan' => $this->input->post('id_golongan'),
			'nama_golongan' => $this->input->post('nama_golongan')
		);
		$query = $this->db->update('ref_golongan', $data, array('id_golongan' => $this->input->post('id_golongan')));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function delete_golongan($id_golongan)
	{
		$query = $this->db->delete('ref_golongan', array('id_golongan' => $id_golongan));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function get_data()
	{
		$this->db->from('ref_jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	public function simpan()
	{
		$data = array(
			'id_jabatan' => $this->input->post('id_jabatan'),
			'nama_jabatan' => $this->input->post('nama_jabatan')
		);
		$query = $this->db->insert('ref_jabatan', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function ubah()
	{
		$data = array(
			'id_jabatan' => $this->input->post('id_jabatan'),
			'nama_jabatan' => $this->input->post('nama_jabatan')
		);
		$query = $this->db->update('ref_jabatan', $data, array('id_jabatan' => $this->input->post('id_jabatan')));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function delete($id_jabatan)
	{
		$query = $this->db->delete('ref_jabatan', array('id_jabatan' => $id_jabatan));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file M_master.php */
/* Location: ./application/models/M_master.php */