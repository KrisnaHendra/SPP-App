<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __CONSTRUCT() {
		parent::__CONSTRUCT();
		$this->load->model('siswa_model','siswa');
		$this->load->model('pembayaran_model','pembayaran');
		$data=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		if(!isset($data)){
		redirect('auth');
		}
	}

	public function index()
	{
		$data['total_masuk']=$this->sum_masuk();
		$data['total_selesai']=$this->sum_selesai();
		$data['konten']='admin/dashboard';
		$this->load->view('admin/template',$data);
	}

	public function siswa(){
		$data['kelas']=$this->siswa->kelas();
		$data['jenis']=$this->siswa->jenis();
		$data['siswa']=$this->siswa->index();
		$data['konten']='admin/siswa';
		$this->load->view('admin/template',$data);
	}
	public function tagihan_siswa(){
		$data['siswa']=$this->siswa->index();
		$data['konten']='admin/tagihan_siswa';
		$this->load->view('admin/template',$data);
	}

	public function add_siswa(){
		$this->siswa->add_siswa();
		$this->session->set_flashdata('notif','<div class="alert alert-sm alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> Data siswa telah ditambahkan!
            </div>');
		redirect('admin/siswa');
	}
	public function delete_siswa($id){
		$this->siswa->delete_siswa($id);
		$this->session->set_flashdata('notif','<div class="alert alert-sm alert-danger alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-trash"></i> Siswa telah dihapus!
            </div>');
		redirect('admin/siswa');
		redirect('admin/siswa');
	}

	public function transaksi_masuk(){
		$data['jumlah']=$this->pembayaran->jumlah_masuk();
		$data['transaksi']=$this->pembayaran->transaksi_masuk();
		$data['konten']='admin/transaksi_masuk';
		$this->load->view('admin/template',$data);
	}
	public function transaksi_sukses(){
		$data['transaksi']=$this->pembayaran->transaksi_sukses();
		$data['konten']='admin/transaksi_sukses';
		$this->load->view('admin/template',$data);
	}

	public function ubah_status_spp() {
		$id=$this->input->post('id_pembayaran');
		$nisn=$this->input->post('nisn');
		$jumlah=$this->input->post('jumlah');
		$this->pembayaran->ubah_status_spp($id,$nisn,$jumlah);
		$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-thumbs-up"></i> Pembayaran SPP telah selesai.
            </div>');
		redirect('admin/transaksi_masuk');
	}
	public function ubah_status_dsp() {
		$id=$this->input->post('id_pembayaran');
		$nisn=$this->input->post('nisn');
		$jumlah=$this->input->post('jumlah');
		$this->pembayaran->ubah_status_dsp($id,$nisn,$jumlah);
		$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-thumbs-up"></i> Pembayaran DSP telah selesai.
            </div>');
		redirect('admin/transaksi_masuk');
	}
	public function ubah_status_lain() {
		$id=$this->input->post('id_pembayaran');
		$nisn=$this->input->post('nisn');
		$jumlah=$this->input->post('jumlah');
		$this->pembayaran->ubah_status_lain($id,$nisn,$jumlah);
		$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-thumbs-up"></i> Pembayaran Tagihan Lainnya telah selesai.
            </div>');
		redirect('admin/transaksi_masuk');
	}

	public function update_tagihan(){
		$id = $this->input->post('id');
		$spp = $this->input->post('spp');
		$dsp = $this->input->post('dsp');
		$lain = $this->input->post('lain');
		$this->siswa->update_tagihan($id,$spp,$dsp,$lain);
		$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> Data tagihan telah diubah.
            </div>');
		redirect('admin/tagihan_siswa');
	}

	public function sum_selesai(){
		$this->db->select('SUM(jumlah) as total');
		$this->db->from('pembayaran');
		$this->db->where('status', 1);
		return $this->db->get()->row()->total;
	}
	public function sum_masuk(){
		$this->db->select('SUM(jumlah) as total');
		$this->db->from('pembayaran');
		$this->db->where('status', 0);
		return $this->db->get()->row()->total;
	}

	public function data_kelas() {
		$data['kelas']=$this->siswa->kelas();
		$data['konten']='admin/data_kelas';
		$this->load->view('admin/template',$data);
	}

	public function add_kelas(){
		$this->siswa->add_kelas();
		$this->session->set_flashdata('notif','<div class="alert alert-sm alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> Data kelas baru telah ditambahkan!
            </div>');
		redirect('admin/data_kelas');
	}
}
