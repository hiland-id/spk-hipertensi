<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_riwayat extends CI_Model
{

	public function get_data()
	{
		$this->db->from('riwayat_periksa');
		$this->db->join('user', 'riwayat_periksa.nik=user.nik', 'left');
		$this->db->join('penyakit', 'riwayat_periksa.id_penyakit=penyakit.id_penyakit', 'left');
		$this->db->join('terapi', 'penyakit.id_terapi=terapi.id_terapi', 'left');
		($this->session->userdata('app_level') != 'admin') ? $this->db->where('riwayat_periksa.nik', $this->session->userdata('nik')) : "";
		$query = $this->db->get();
		return $query->result();
	}

	public function hapus_data($id)
	{
		$query = $this->db->where('id_riwayat', $id)->delete('riwayat_periksa');
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file M_riwayat.php */
/* Location: ./application/models/M_riwayat.php */