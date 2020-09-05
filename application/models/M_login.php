<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

	public function cek_nik($nik)
	{
		$this->db->from('akun');
		$this->db->where('nik', $nik);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function cek_password($password, $nik)
	{
		$this->db->from('akun');
		$this->db->where('password', $password);
		$this->db->where('nik', $nik);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_data_login($nik)
	{
		$this->db->from('akun');
		$this->db->join('user', 'akun.nik = user.nik', 'left');
		$this->db->where('akun.nik', $nik);
		$query = $this->db->get();
		$data = $query->result_array();
		$array = array();
		foreach ($data as $row) {
			$array = $row;
		}
		if (!isset($array)) {
			$array = '';
		}
		return $array;
	}
}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */