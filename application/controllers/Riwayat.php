<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_riwayat');
		if (!$this->session->userdata('nik')) {
			redirect('login');
		}
		
	}
	public function index()
	{
		$data['session']=$this->session->all_userdata();
		$data['riwayat'] =$this->m_riwayat->get_data();
        $data['jabatan'] =$this->m_riwayat->get_jabatan();
        $data['golongan'] =$this->m_riwayat->get_golongan();
		$data['tampilan'] = 'riwayat';
		$this->load->view('template/media',$data);
	}

	public function tambah()
	{
		$data['tampilan'] = 'tambah-riwayat';
		$this->load->view('template/media',$data);
	}

	public function edit($id_riwayat)
	{
		$data['edit'] = $this->m_riwayat->get_data_edit($id_riwayat);
		$this->load->view('edit',$data);
	}
	//edit ajak

	public function simpan()
	{
		if(empty($this->input->post('id_riwayat'))){
			$aksi = $this->m_riwayat->simpan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data riwayat Berhasil Disimpan');
				redirect('riwayat');
			}else{
				$this->session->set_flashdata('gagal','Data riwayat Gagal Disimpan');
				redirect('riwayat/tambah');
			}
		}else{
			$aksi = $this->m_riwayat->ubah();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data riwayat Berhasil Diubah');
				redirect('riwayat');
			}else{
				$this->session->set_flashdata('berhasil','Data riwayat Tidak Berhasil Diubah');
				redirect('riwayat/edit');
			}
		}
	}
	public function simpanpengangkatan()
	{
		if(empty($this->input->post('id_pengangkatan'))){
			$aksi = $this->m_riwayat->simpan();
		}else{
			$aksi = $this->m_riwayat->ubah();
		}
	}

	public function hapus($id_riwayat)
	{
		$aksi = $this->m_riwayat->delete($id_riwayat);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data riwayat Berhasil Dihapus');
			redirect('riwayat');
		}else{
			$this->session->set_flashdata('gagal','Data riwayat Tidak Berhasil Dihapus');
			redirect('riwayat');
		}
	}

}

/* End of file Riwayat.php */
/* Location: ./application/controllers/Riwayat.php */

?>