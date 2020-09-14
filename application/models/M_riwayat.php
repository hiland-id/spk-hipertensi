<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_riwayat extends CI_Model {

	public function get_data(){
		$this->db->from('riwayat_periksa');
        $this->db->join('user','riwayat_periksa.nik=user.nik','left');
		$this->db->join('penyakit','riwayat_periksa.id_penyakit=penyakit.id_penyakit','left');
		$this->db->join('terapi','penyakit.id_terapi=terapi.id_terapi','left');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file M_riwayat.php */
/* Location: ./application/models/M_riwayat.php */