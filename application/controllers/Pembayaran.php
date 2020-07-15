<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __CONSTRUCT() {
		parent::__CONSTRUCT();
		$this->load->model('Pembayaran_model','pembayaran');
		$this->load->model('Siswa_model','siswa');
		$data=$this->db->get_where('siswa',['email'=>$this->session->userdata('email')])->row_array();
		if(!isset($data)){
		redirect('auth');
		}
	}

	public function index()
	{
		$data['kelas']=$this->siswa->get_kelas();
        $data['konten']='siswa/pembayaran';
		$this->load->view('siswa/template',$data);
    }
    
	public function history()
	{
		$data['kelas']=$this->siswa->get_kelas();
		$data['history']=$this->pembayaran->history();
        $data['konten']= 'siswa/history_pembayaran';
		$this->load->view('siswa/template',$data);
	}

	public function bayar(){
		$this->pembayaran->upload();
		redirect('pembayaran');
	}

}
