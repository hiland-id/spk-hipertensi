<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_user');
        if (!$this->session->userdata('nik')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['session'] = $this->session->all_userdata();
        $data['tampilan'] = 'user';
        $data['dt_user'] = $this->m_user->get_data_user();
        $data['dt_jk'] = $this->m_user->get_data_jk();
        $data['dt_agama'] = $this->m_user->get_data_agama();
        $this->load->view('template/media', $data);
    }

    public function dokumen()
    {
        echo ":LAMAN DOKUMEN";
    }

    // public function riwayat()
    // {
    //     if (empty($this->uri->segment(3))) {
    //         $data['session'] = $this->session->all_userdata();
    //         $data['tampilan'] = 'riwayat';
    //         $data['dt_user'] = $this->m_user->get_data_user();
    //         $this->load->view('template/media', $data);
    //     } else {
    //         $nik = $this->uri->segment(3);
    //         $data['session'] = $this->session->all_userdata();
    //         $data['tampilan'] = 'list_riwayat';
    //         $data['dt_riwayat'] = $this->m_user->get_data_riwayat($nik);
    //         $data['nik'] = $this->uri->segment(3);
    //         $this->load->view('template/media', $data);
    //     }
    // }

    public function simpan()
    {
        $query = $this->m_user->simpan_dt_user();
        if ($query) {
            $this->session->set_flashdata("berhasil", "Simpan data berhasil");
            redirect('user');
        } else {
            $this->session->set_flashdata("gagal", "Simpan data tidak berhasil");
            redirect('user');
        }
    }

    public function simpan_dt_riwayat()
    {
        $nik = $this->input->post('nik');
        $query = $this->m_user->simpan_dt_riwayat();
        if ($query) {
            $this->session->set_flashdata("berhasil", "Simpan data berhasil");
            redirect('user/riwayat/' . $nik);
        } else {
            $this->session->set_flashdata("gagal", "Simpan data tidak berhasil");
            redirect('user/riwayat/' . $nik);
        }
    }

    public function detail_user()
    {
        $nik = $this->input->post('nik');
        $query = $this->m_user->get_data_detail($nik);
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function get_dt_update_user()
    {
        $nik = $this->input->post('nik');
        $query = $this->m_user->get_dt_edit($nik);
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function update()
    {
        $query = $this->m_user->update_dt_user();
        if ($query) {
            $this->session->set_flashdata("berhasil", "Update data berhasil");
            $session = $this->m_login->get_data_login($this->session->userdata('nik'));
            $this->session->set_userdata($session);
            redirect('user');
        } else {
            $this->session->set_flashdata("gagal", "Update data tidak berhasil");
            redirect('user');
        }
    }

    // public function update_dt_riwayat()
    // {
    //     $nik = $this->input->post('nik');
    //     $query = $this->m_user->update_dt_riwayat();
    //     if ($query) {
    //         $this->session->set_flashdata("berhasil", "Update data berhasil");
    //         redirect('user/riwayat/' . $nik);
    //     } else {
    //         $this->session->set_flashdata("gagal", "Update data tidak berhasil");
    //         redirect('user/riwayat/' . $nik);
    //     }
    // }

    public function hapus($nik)
    {
        $query = $this->m_user->hapus_dt_user($nik);
        if ($query) {
            $this->session->set_flashdata("berhasil", "Hapus data berhasil");
            redirect('user');
        } else {
            $this->session->set_flashdata("gagal", "Hapus data tidak berhasil");
            redirect('user');
        }
    }

    public function reset_password($nik)
    {
        $query = $this->m_user->reset_password($nik);
        if ($query) {
            $this->session->set_flashdata("berhasil", "Reset password berhasil");
            redirect('user');
        } else {
            $this->session->set_flashdata("gagal", "Reset password tidak berhasil");
            redirect('user');
        }
    }

    // public function hapus_riwayat($id_riwayat, $nik)
    // {
    //     $query = $this->m_user->hapus_dt_riwayat($id_riwayat);
    //     if ($query) {
    //         $this->session->set_flashdata("berhasil", "Hapus data berhasil");
    //         redirect('user/riwayat/' . $nik);
    //     } else {
    //         $this->session->set_flashdata("gagal", "Hapus data tidak berhasil");
    //         redirect('user/riwayat/' . $nik);
    //     }
    // }

    public function aktivasi($id_riwayat = "", $nik = "")
    {
        $query = $this->m_user->aktivasi_dt_riwayat($id_riwayat, $nik);
        if ($query) {
            $this->session->set_flashdata("berhasil", "Aktivasi SK berhasil");
            redirect('user/riwayat/' . $nik);
        } else {
            $this->session->set_flashdata("gagal", "Aktivasi SK tidak berhasil");
            redirect('user/riwayat/' . $nik);
        }
    }

    public function cek_nik()
    {
        $nik = $this->input->post('nik');
        $query = $this->m_user->cek_nik($nik);
        if ($query > 0) {
            $json['status'] = false;
            $json['pesan'] = "nik telah didaftarkan dan tersimpan di database";
        } else {
            $json['status'] = true;
            $json['pesan'] = "nik tersebut dapat didaftarkan sebagai data baru";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function cek_nik_aktif()
    {
        $nik = $this->input->post('nik');
        $query = $this->m_user->cek_nik_aktif($nik);
        if ($query) {
            $json['status'] = true;
            $json['data'] = $query;
            $json['pesan'] = "nik telah terdaftar";
        } else {
            $json['status'] = false;
            $json['pesan'] = "nik tidak terdaftar, cek kembali nik";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function cek_id_riwayat()
    {
        $id_riwayat = $this->input->post('id_riwayat');
        $query = $this->m_user->cek_id_riwayat($id_riwayat);
        if ($query) {
            $json['status'] = true;
            $json['data'] = $query;
            $json['pesan'] = "nik terverifikasi";
        } else {
            $json['status'] = false;
            $json['pesan'] = "nik tidak terverifikasi, cek kembali nik";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file user.php */
