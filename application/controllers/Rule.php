<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_rule');
		if (!$this->session->userdata('nik')) {
			redirect('login');
		}
		
	}

	public function index()
	{
		$data['session']=$this->session->all_userdata();
		$data['rule']=$this->m_rule->get_data();
        $data['gejala'] =$this->m_rule->get_gejala();
        $data['penyakit'] =$this->m_rule->get_penyakit();
		$data['tampilan']='rule';
		$this->load->view('template/media', $data);
	}

	public function tambah()
	{
		$data['tampilan']='tambah-rule';
		$this->load->view('template/media', $data);
	}

	public function edit($id_rule)
	{
		$data['edit'] = $this->m_rule->get_data_edit($id_rule);
		$this->load->view('edit',$data);
	}
	//edit ajak

	public function simpan()
	{
		if(empty($this->input->post('id_rule'))){
			$aksi = $this->m_rule->simpan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data rule Berhasil Disimpan');
				redirect('rule');
			}else{
				$this->session->set_flashdata('gagal','Data rule Gagal Disimpan');
				redirect('rule/tambah');
			}
		}else{
			$aksi = $this->m_rule->ubah();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data rule Berhasil Diubah');
				redirect('rule');
			}else{
				$this->session->set_flashdata('berhasil','Data rule Tidak Berhasil Diubah');
				redirect('rule/edit');
			}
		}
	}

	public function hapus($id_rule)
	{
		$aksi = $this->m_rule->delete($id_rule);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data rule Berhasil Dihapus');
			redirect('rule');
		}else{
			$this->session->set_flashdata('gagal','Data rule Tidak Berhasil Dihapus');
			redirect('rule');
		}
	}

}

/* End of file Rule.php */
/* Location: ./application/controllers/Rule.php */