<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_dashboard');
        $this->load->model('m_diagnosa');
        $this->load->model('m_gejala');
        $this->load->model('m_penyakit');
        $this->load->model('m_riwayat');
        $this->load->model('m_rule');
        $this->load->model('m_terapi');
        $this->load->model('m_user');

        if (!$this->session->userdata('nik')) {
            redirect('login');
        }
    }
}

/* End of file MY_Controller.php */
