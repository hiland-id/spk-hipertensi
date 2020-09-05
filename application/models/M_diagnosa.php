<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_diagnosa extends CI_Model
{
    public function get_dt_gejala()
    {
        return $this->db->get('gejala');
    }


    public function count_penyakit()
    {
        $query = $this->db->select('rule.*, penyakit.*, terapi.*, penyakit.id_penyakit id_penyakit_aktif')
            ->from('rule')
            ->join('penyakit', 'penyakit.id_penyakit = rule.id_penyakit', 'left')
            ->join('terapi', 'terapi.id_terapi = penyakit.id_terapi', 'left')
            ->group_by('rule.id_penyakit')
            ->get()
            ->result();
        return $query;
    }

    public function get_jml_gejala($id_penyakit)
    {
        $query = $this->db->from('rule')
            ->where('id_penyakit', $id_penyakit)
            ->get()
            ->num_rows();
        return $query;
    }

    public function postDiagnosaModel()
    {
        $diagnosa = array();
        $penyakit = $this->count_penyakit();
        foreach ($penyakit as $key => $data) {
            $jumlah_gejala = $this->get_jml_gejala($data->id_penyakit);
            $gejala = 0;
            foreach ($this->input->post('gejala') as $input_gejala) {
                $query = $this->db->from('rule')->where('id_penyakit', $data->id_penyakit)->where('id_gejala', $input_gejala)->get()->row();
                if ($query) {
                    $gejala = $gejala + 1;
                }
            }
            $skor = ($gejala / $jumlah_gejala) * 100;
            if (($skor <= 100) and ($skor > 0)) {
                $diagnosa[$key] = [
                    'id_penyakit' => $data->id_penyakit_aktif,
                    'nama_penyakit' => $data->penyakit,
                    'deskripsi' => $data->deskripsi,
                    'terapi' => $data->terapi,
                    'skor' => $skor
                ];
            }
        }

        return $diagnosa;
    }
}

/* End of file M_diagnosa.php */
