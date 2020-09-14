<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_diagnosa');
    }


    public function index()
    {
        $data['session'] = $this->session->all_userdata();
        $data['dt_gejala'] = $this->m_diagnosa->get_dt_gejala()->result();
        $data['user']=$this->m_diagnosa->get_user();
        $data['tampilan'] = 'diagnosa';
        $this->load->view('template/media', $data);
    }

    public function hasil()
    {
        $data['session'] = $this->session->all_userdata();
        $data['diagnosa'] = $this->m_diagnosa->postDiagnosaModel();
        // $simpan = $this->m_diagnosa->saveDiagnosa();
        $data['tampilan'] = 'post_diagnosa';
        $this->load->view('template/media', $data);
        // $aksi = $this->m_diagnosa->saveDiagnosa();
        //     if($aksi){
        //         $this->session->set_flashdata('berhasil','Data gejala Berhasil Disimpan');
        //         redirect('diagnosa');
        //     }else{
        //         $this->session->set_flashdata('gagal','Data gejala Gagal Disimpan');
        //         redirect('diagnosa');
        //     }
    }
}

/* End of file Diagnosa.php */
