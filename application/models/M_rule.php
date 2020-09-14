<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rule extends CI_Model {

	public function get_data(){
		$this->db->from('rule');
        $this->db->join('gejala','rule.id_gejala=gejala.id_gejala','left');
        $this->db->join('penyakit','rule.id_penyakit=penyakit.id_penyakit','left');
        $this->db->join('terapi','penyakit.id_terapi=terapi.id_terapi','left');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_gejala(){
		$this->db->from('gejala');
		$query = $this->db->get();
		return $query->result();
    }
    public function get_penyakit(){
		$this->db->from('penyakit');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_data_edit($id_rule)
	{
		$this->db->from('rule');
		$this->db->where('id_rule',$id_rule);
		$query = $this->db->get();

		return $query->row();
	}
	public function simpan(){
		$data = array('id_gejala' => $this->input->post('id_gejala'),
			'id_penyakit'=>$this->input->post('id_penyakit')
		);
		$query=$this->db->insert('rule', $data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function ubah(){
		$data = array('id_gejala'=>$this->input->post('id_gejala') ,
			'id_penyakit'=>$this->input->post('id_penyakit')
		);
		$query=$this->db->update('rule',$data, array('id_rule' => $this->input->post('id_rule')));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id_rule){
		$query=$this->db->delete('rule', array('id_rule' => $id_rule));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_rule.php */
/* Location: ./application/models/M_rule.php */