<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function aksi_ubah_password_query()
    {
        $password_baru = $this->input->post('password');
        $nik = $this->session->userdata('nik');
        $q = $this->db->update('akun', array('password' => md5($password_baru)), array('nik' => $nik));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    public function get_dt_gejala()
    {
        return $this->db->get('gejala')->num_rows();
    }

    public function get_dt_penyakit()
    {
        return $this->db->get('penyakit')->num_rows();
    }

    public function get_dt_rule()
    {
        return $this->db->get('rule')->num_rows();
    }

    public function get_dt_pasien()
    {
        return $this->db->from('akun')->where('app_level', 'user')->get()->num_rows();
    }

    public function get_dt_check_up()
    {
        return $this->db->from('riwayat_periksa')->where('nik', $this->session->userdata('nik'))->get()->num_rows();
    }

    public function get_dt_check_up_latest()
    {
        $this->db->from('riwayat_periksa');
        $this->db->join('user', 'riwayat_periksa.nik=user.nik', 'left');
        $this->db->join('penyakit', 'riwayat_periksa.id_penyakit=penyakit.id_penyakit', 'left');
        $this->db->join('terapi', 'penyakit.id_terapi=terapi.id_terapi', 'left');
        ($this->session->userdata('app_level') != 'admin') ? $this->db->where('riwayat_periksa.nik', $this->session->userdata('nik')) : "";
        $this->db->order_by('riwayat_periksa.id_riwayat', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file M_dashboard.php */
/* Location: ./application/models/M_dashboard.php */
