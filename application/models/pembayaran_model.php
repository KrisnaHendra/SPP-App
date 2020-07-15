<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    private function _uploadImage()
    {
    $config['upload_path']          = './upload/image/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = time();
    $config['overwrite']			= true;
    $config['max_size']             = 5120; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('bukti')) {
        return $this->upload->data("file_name");
    }
    return "error.jpg";
    }

    public function upload(){
        $data=[
            'nisn' => $this->session->userdata('nisn'),
            'jumlah' => $this->input->post('jumlah'),
            'bayar' => $this->input->post('bayar'),
            'bukti' => $this->_uploadImage(),
            'status' => 0,
            'created_at' => time()
        ];
        $this->db->insert('pembayaran', $data);
        $this->session->set_flashdata('notif','<div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check"></i> Terimakasih, pembayaran berhasil dan akan segera diproses.
            </div>');
    }

    public function history(){
        $query=$this->db->query("SELECT * FROM pembayaran p JOIN siswa s ON p.nisn = s.nisn JOIN kelas k ON s.id_kelas = k.id_kelas WHERE s.nisn='".$this->session->nisn."'");
        return $query->result_array();
    }

    public  function transaksi_masuk() {
        $query=$this->db->query("SELECT * FROM pembayaran p JOIN siswa s ON p.nisn = s.nisn JOIN kelas k ON s.id_kelas = k.id_kelas WHERE p.status=0");
        return $query->result_array();
    }
    public  function transaksi_sukses() {
        $query=$this->db->query("SELECT * FROM pembayaran p JOIN siswa s ON p.nisn = s.nisn JOIN kelas k ON s.id_kelas = k.id_kelas WHERE p.status=1 ORDER BY p.created_at ASC;");
        return $query->result_array();
    }

    public function ubah_status_spp($id,$nisn,$jumlah) {
        $query=$this->db->query("UPDATE pembayaran SET status=1 WHERE id_pembayaran='$id'");
        $query=$this->db->query("UPDATE siswa SET SPP=SPP-'$jumlah' WHERE nisn='$nisn'");
        return $query;
    }
    public function ubah_status_dsp($id,$nisn,$jumlah) {
        $query=$this->db->query("UPDATE pembayaran SET status=1 WHERE id_pembayaran='$id'");
        $query=$this->db->query("UPDATE siswa SET DSP=DSP-'$jumlah' WHERE nisn='$nisn'");
        return $query;
    }
    public function ubah_status_lain($id,$nisn,$jumlah) {
        $query=$this->db->query("UPDATE pembayaran SET status=1 WHERE id_pembayaran='$id'");
        $query=$this->db->query("UPDATE siswa SET LAIN=LAIN-'$jumlah' WHERE nisn='$nisn'");
        return $query;
    }

    public function jumlah_masuk(){
		$this->db->select('COUNT(id_pembayaran) as jumlah');
		$this->db->from('pembayaran');
		$this->db->where('status', 0);
		return $this->db->get()->row()->jumlah;
	}

}

/* End of file Pembayaran_model.php */
