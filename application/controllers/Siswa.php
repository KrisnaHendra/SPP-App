<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __CONSTRUCT() {
		parent::__CONSTRUCT();
		$this->load->model('siswa_model','siswa');
		$data=$this->db->get_where('siswa',['email'=>$this->session->userdata('email')])->row_array();
		if(!isset($data)){
		redirect('auth');
		}
	}

	public function index()
	{
		$data['siswa']=$this->siswa->getSiswa();
		$data['konten']='siswa/index';
		$this->load->view('siswa/template',$data);
	}

	public function profil(){
		$data['data']=$this->siswa->detail_siswa();
		$data['konten']='siswa/profil';
		$this->load->view('siswa/template',$data);
	}
}
