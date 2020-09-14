<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyakit extends CI_Model
{

	public function get_data()
	{
		$this->db->from('penyakit');
		$this->db->join('terapi', 'penyakit.id_terapi=terapi.id_terapi', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_terapi()
	{
		$this->db->from('terapi');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_data_edit($id_penyakit)
	{
		$this->db->from('penyakit');
		$this->db->join('terapi', 'penyakit.id_terapi=terapi.id_terapi', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function simpan()
	{
		$data = array(
			'id_penyakit' => $this->input->post('id_penyakit'),
			'penyakit' => $this->input->post('penyakit'),
			'deskripsi' => $this->input->post('deskripsi'),
			'id_terapi' => $this->input->post('id_terapi')
		);
		$query = $this->db->insert('penyakit', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function ubah()
	{
		$data = array(
			'penyakit' => $this->input->post('penyakit'),
			'deskripsi' => $this->input->post('deskripsi'),
			'id_terapi' => $this->input->post('id_terapi')
		);
		$query = $this->db->update('penyakit', $data, array('id_penyakit' => $this->input->post('id_penyakit')));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id_penyakit)
	{
		$query = $this->db->delete('penyakit', array('id_penyakit' => $id_penyakit));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file M_penyakit.php */
/* Location: ./application/models/M_penyakit.php */