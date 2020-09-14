<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_penyakit');
		if (!$this->session->userdata('nik')) {
			redirect('login');
		}
		
	}
	public function index()
	{
		$data['session']=$this->session->all_userdata();
		$data['penyakit'] =$this->m_penyakit->get_data();
		$data['terapi']=$this->m_penyakit->get_terapi();
		$data['tampilan'] = 'penyakit';
		$this->load->view('template/media',$data);
	}

	public function tambah()
	{
		$data['tampilan'] = 'tambah-penyakit';
		$this->load->view('template/media',$data);
	}

	// public function edit($id_penyakit)
	// {
	// 	$data['edit'] = $this->m_penyakit->get_data_edit($id_penyakit);
	// 	$this->load->view('edit',$data);
	// }
	//edit ajak

	public function simpan()
	{
		if(empty($this->input->post('id_penyakit'))){
			$aksi = $this->m_penyakit->simpan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data penyakit Berhasil Disimpan');
				redirect('penyakit');
			}else{
				$this->session->set_flashdata('gagal','Data penyakit Gagal Disimpan');
				redirect('penyakit/tambah');
			}
		}else{
			$aksi = $this->m_penyakit->ubah();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data penyakit Berhasil Diubah');
				redirect('penyakit');
			}else{
				$this->session->set_flashdata('berhasil','Data penyakit Tidak Berhasil Diubah');
				redirect('penyakit/edit');
			}
		}
	}

	public function hapus($id_penyakit)
	{
		$aksi = $this->m_penyakit->delete($id_penyakit);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data penyakit Berhasil Dihapus');
			redirect('penyakit');
		}else{
			$this->session->set_flashdata('gagal','Data penyakit Tidak Berhasil Dihapus');
			redirect('penyakit');
		}
	}

}

/* End of file Penyakit.php */
/* Location: ./application/controllers/Penyakit.php */ 