<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    public function index(){
        $query=$this->db->query("SELECT * FROM siswa s JOIN kelas k ON s.id_kelas=k.id_kelas JOIN jenis_kelamin j on s.id_jenis=j.id_jenis");
        return $query->result_array();
    }    

    public function add_siswa()
    {
        $data=[
            'nisn' => $this->input->post('nisn'),
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'id_kelas' => $this->input->post('id_kelas'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'id_jenis' => $this->input->post('kelamin'),
            'SPP' => 0,
            'DSP' => 0,
            'LAIN' => 0
        ];
        $this->db->insert('siswa',$data);
    }

    public function delete_siswa($id){
        $this->db->query("DELETE FROM siswa WHERE id='$id'");
    }

    public function get_kelas(){
        $query=$this->db->query("SELECT * FROM siswa s JOIN kelas k on s.id_kelas=k.id_kelas WHERE nisn='".$this->session->nisn."'");
        return $query->result_array();
    }

    public function update_tagihan($id,$spp,$dsp,$lain){
        $query= $this->db->query("UPDATE siswa SET SPP=$spp, DSP=$dsp, LAIN=$lain WHERE id=$id");
        return $query;
    }

    public function getSiswa(){
        $query=$this->db->query("SELECT * FROM siswa WHERE nisn='".$this->session->nisn."'");
        return $query->result_array();
    }

    public function kelas(){
        $query=$this->db->query("SELECT * FROM kelas ORDER BY nama_kelas ASC");
        return $query->result_array();
    }
    public function jenis(){
        $query=$this->db->query("SELECT * FROM jenis_kelamin");
        return $query->result_array();
    }

    public function add_kelas(){
        $data=[
            'nama_kelas' => $this->input->post('nama_kelas'),
            'keahlian' => $this->input->post('keahlian'),
        ];       
        $this->db->insert('kelas', $data);
    }

    public function detail_siswa(){
        $query = $this->db->query("SELECT * FROM siswa s JOIN jenis_kelamin j ON s.id_jenis=j.id_jenis JOIN kelas k ON s.id_kelas=k.id_kelas WHERE nisn='".$this->session->nisn."'");
        return $query->result_array();
    }
}

/* End of file Siswa_model.php */
