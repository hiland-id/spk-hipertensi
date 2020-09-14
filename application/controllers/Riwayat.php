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
		$data['tampilan'] = 'list_riwayat';
		$this->load->view('template/media',$data);
	}

}

/* End of file Riwayat.php */
/* Location: ./application/controllers/Riwayat.php */

?>