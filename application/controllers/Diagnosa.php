<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['session'] = $this->session->all_userdata();
        $data['dt_gejala'] = $this->m_diagnosa->get_dt_gejala()->result();
        $data['user'] = $this->m_diagnosa->get_user();
        $data['tampilan'] = 'diagnosa';
        $this->load->view('template/media', $data);
    }

    public function hasil()
    {
        $data['session'] = $this->session->all_userdata();
        $data['diagnosa'] = $this->m_diagnosa->postDiagnosaModel();
        $data['tampilan'] = 'post_diagnosa';
        $this->load->view('template/media', $data);
    }
}

/* End of file Diagnosa.php */
