<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_riwayat extends CI_Model {

	public function get_data(){
		$this->db->from('riwayat');
        $this->db->join('user','riwayat.nik=user.nik','left');
		$this->db->join('golongan','riwayat.id_golongan=golongan.id_golongan','left');
		$this->db->join('jabatan','riwayat.id_jabatan=jabatan.id_jabatan','left');
		$this->db->join('pengangkatan','riwayat.id_pengangkatan=pengangkatan.id_pengangkatan','left');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_jabatan(){
		$this->db->from('jabatan');
		$query = $this->db->get();
		return $query->result();
	}
    public function get_golongan(){
		$this->db->from('golongan');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_data_edit($id_riwayat)
	{
		$this->db->from('riwayat');
		$this->db->where('id_riwayat',$id_riwayat);
		$query = $this->db->get();

		return $query->row();
	}
	public function simpan()
	{
		$data = array('nik' => $this->input->post('nik'),
					  'id_jabatan' => $this->input->post('id_jabatan'),
					  'id_golongan' => $this->input->post('id_golongan'),
					  'tanggal_kenaikan' => $this->input->post('tanggal_kenaikan'),
					  'no_sk' => $this->input->post('no_sk')
					 );
		$query = $this->db->insert('riwayat',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpanpengangkatan()
	{
		$data = array('nik' => $this->input->post('nik'), 
					  'tanggal_pengangkatan' => $this->input->post('tanggal_kenaikan'),
					  'masa_aktif_jabatan' => $this->input->post('masa_aktif_jabatan')
					 );
		$query = $this->db->insert('pengangkatan',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function ubah()
	{
		$data = array('nik' => $this->input->post('nik'),
					  'id_jabatan' => $this->input->post('id_jabatan'),
					  'id_golongan' => $this->input->post('id_golongan'),
					  'tanggal_kenaikan' => $this->input->post('tanggal_kenaikan'),
					  'no_sk' => $this->input->post('no_sk')
					 );
		$query = $this->db->update('riwayat',$data, array('id_riwayat' => $this->input->post('id_riwayat')));
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function ubahpengangkatan()
	{
		$data = array('nik' => $this->input->post('nik'), 
					  'tanggal_pengangkatan' => $this->input->post('tanggal_kenaikan'),
					  'masa_aktif_jabatan' => $this->input->post('masa_aktif_jabatan')
					 );
		$query = $this->db->update('pengangkatan',$data, array('id_pengangkatan' => $this->input->post('id_pengangkatan')));
		if($query){
			return true;
		}else{
			return false;
		}
	}



	public function delete($id_riwayat)
	{
		$query = $this->db->delete('riwayat', array('id_riwayat' => $id_riwayat));
		if($query){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_riwayat.php */
/* Location: ./application/models/M_riwayat.php */