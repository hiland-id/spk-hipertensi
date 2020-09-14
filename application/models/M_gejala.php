<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gejala extends CI_Model {

	public function get_data(){
		$this->db->from('gejala');
		$query=$this->db->get();
		return $query->result();
	}

	public function get_data_edit($id_gejala)
	{
		$this->db->from('gejala');
		$this->db->where('id_gejala',$id_gejala);
		$query = $this->db->get();

		return $query->row();
    }
	public function simpan(){
		$data = array('id_gejala' => $this->input->post('id_gejala'),
			'gejala'=>$this->input->post('gejala')
		);
        $query=$this->db->insert('gejala', $data);
        var_dump($data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function ubah(){
		$data = array('gejala'=>$this->input->post('gejala')
		);
		$query=$this->db->update('gejala',$data, array('id_gejala' => $this->input->post('id_gejala')));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id_gejala){
		$query=$this->db->delete('gejala', array('id_gejala' => $id_gejala));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_gejala.php */
/* Location: ./application/models/M_gejala.php */