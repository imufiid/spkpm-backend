<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_nilai_gap extends CI_Model
{

    protected $kriteria = "ak_data_kriteria";
    protected $subkriteria = "ak_data_subkriteria";
    protected $rekomendasi = "ak_data_rekomendasi";
    protected $rekomendasi_nilai = "ak_data_rekomendasi_nilai";
    protected $siswa_nilai = "ak_data_siswa_nilai";
    protected $pengguna = "ak_data_system_user";

    public function get_kriteria()
    {
        return $this->db->where($this->kriteria . '.deleted', FALSE)->get($this->kriteria);
    }

    public function get_subkriteria($kriteria)
    {
        return $this->db->where($this->subkriteria . '.deleted', FALSE)->where($this->subkriteria . '.kriteria_id', $kriteria)->get($this->subkriteria);
    }

    public function get_user()
    {
        return $this->db->where($this->pengguna . '.deleted', FALSE)->where($this->pengguna . '.level_id', 4)->get($this->pengguna);
    }

    public function get_rekomendasi()
    {
        return $this->db->where($this->rekomendasi . '.deleted', FALSE)->get($this->rekomendasi);
    }

    public function get_rekomendasi_nilai($kriteria, $sub, $rekomendasi)
    {
        return $this->db->where($this->rekomendasi_nilai . '.kriteria_id', $kriteria)->where($this->rekomendasi_nilai . '.subkriteria_id', $sub)->where($this->rekomendasi_nilai . '.rekomendasi_id', $rekomendasi)->get($this->rekomendasi_nilai)->row('rekomendasi_nilai_bobot');
    }

    public function get_nilai($user, $sub)
    {
        return $this->db->where($this->siswa_nilai . '.subkriteria_id', $sub)->where($this->siswa_nilai . '.user_id', $user)->get($this->siswa_nilai)->row('siswa_nilai');
    }
}
