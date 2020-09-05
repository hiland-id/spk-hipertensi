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

    public function q_gol_1_a()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'I/A');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_1_b()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'I/B');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_1_c()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'I/C');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_1_d()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'I/D');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_2_a()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'II/A');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_2_b()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'II/B');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_2_c()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'II/C');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_2_d()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'II/D');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_3_a()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'III/A');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_3_b()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'III/B');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_3_c()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'III/C');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_3_d()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'III/D');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_4_a()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'IV/A');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_4_b()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'IV/B');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_4_c()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'IV/C');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_4_d()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'IV/D');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }

    public function q_gol_4_e()
    {
        $this->db->from('user a');
        $this->db->join('ref_golongan b', 'a.id_golongan = b.id_golongan', 'left');
        $this->db->where('b.nama_golongan', 'IV/E');
        $q = $this->db->get();
        if ($q) {
            return $q->num_rows();
        }
    }
}

/* End of file M_dashboard.php */
/* Location: ./application/models/M_dashboard.php */
