<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $this->form_validation->set_rules('email','Email','trim|required|valid_email',[
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email tidak benar!'
        ]);
        $this->form_validation->set_rules('password','Password','trim|required',[
            'required' => 'Password tidak boleh kosong!',
        ]);

        if($this->form_validation->run()==FALSE){
            $this->load->view('auth/login');
        }else{
            $this->proses_login();
        }

    }

    public function proses_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('user',['email'=>$email])->row_array();
        $siswa = $this->db->get_where('siswa',['email'=>$email])->row_array();

        if($admin){
            if(password_verify($password,$admin['password'])){
                $data = [
                    'email' => $admin['email'],
                    'password' => $admin['password'],
                    'name' => $admin['name'],
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Password Salah!
            </div>');
            redirect('auth');
        }elseif($siswa){
            if($password==$siswa['password']){
                $data = [
                    'email' => $siswa['email'],
                    'password' => $siswa['password'],
                    'name' => $siswa['name'],
                    'nisn' => $siswa['nisn'],
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($data);
                redirect('siswa');
            } $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Password Salah!
            </div>');
            redirect('auth');
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Akun Tidak Ditemukan!
            </div>');
            redirect('auth');
        }
    }

    public function registration(){
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('auth/registration');
        }else{
            $register=[
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'id_status' => 2,
                'aktif' => 1,
                'created_at' => time()
            ];
            $this->db->insert('user',$register);
            $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> <strong>Account Has Been Created!</strong>
            </div>');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->set_flashdata('notif','<div class="alert alert-light alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i> You Have Been Logged Out!
        </div>');
        redirect('auth');
    }
}
