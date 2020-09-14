<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_terapi extends CI_Model {

	public function get_data(){
		$this->db->from('terapi');
		$query=$this->db->get();
		return $query->result();
	}

	public function get_data_edit($id_terapi)
	{
		$this->db->from('terapi');
		$this->db->where('id_terapi',$id_terapi);
		$query = $this->db->get();

		return $query->row();
    }
	public function simpan(){
		$data = array('id_terapi' => $this->input->post('id_terapi'),
			'terapi'=>$this->input->post('terapi')
		);
        $query=$this->db->insert('terapi', $data);
        var_dump($data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function ubah(){
		$data = array('terapi'=>$this->input->post('terapi')
		);
		$query=$this->db->update('terapi',$data, array('id_terapi' => $this->input->post('id_terapi')));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id_terapi){
		$query=$this->db->delete('terapi', array('id_terapi' => $id_terapi));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_terapi.php */
/* Location: ./application/models/M_terapi.php */