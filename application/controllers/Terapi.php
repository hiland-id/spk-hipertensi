<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class terapi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_terapi');
		if (!$this->session->userdata('nik')) {
			redirect('login');
		}
	}
	public function index()
	{
        $data['session']=$this->session->all_userdata();
        $data['terapi']=$this->m_terapi->get_data();
		$data['tampilan']='terapi';
		$this->load->view('template/media', $data);
	}

	public function tambah()
	{
		$data['tampilan']='tambah-terapi';
		$this->load->view('template/media', $data);
	}

	public function edit($id_terapi)
	{
		$data['edit'] = $this->m_terapi->get_data_edit($id_terapi);
		$this->load->view('edit',$data);
	}
	//edit ajak

	public function simpan()
	{
		if(empty($this->input->post('id_terapi'))){
			$aksi = $this->m_terapi->simpan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data terapi Berhasil Disimpan');
				redirect('terapi');
			}else{
				$this->session->set_flashdata('gagal','Data terapi Gagal Disimpan');
				redirect('terapi/tambah');
			}
		}else{
			$aksi = $this->m_terapi->ubah();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data terapi Berhasil Diubah');
				redirect('terapi');
			}else{
				$this->session->set_flashdata('berhasil','Data terapi Tidak Berhasil Diubah');
				redirect('terapi/edit');
			}
		}
	}
	public function hapus($id_terapi)
	{
		$aksi = $this->m_terapi->delete($id_terapi);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data terapi Berhasil Dihapus');
			redirect('terapi');
		}else{
			$this->session->set_flashdata('gagal','Data terapi Tidak Berhasil Dihapus');
			redirect('terapi');
		}
	}

}

/* End of file terapi.php */
/* Location: ./application/controllers/terapi.php */