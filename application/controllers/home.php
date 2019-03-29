<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->model('m_user','user');
        if ($this->session->userdata('login')!=TRUE) {
                redirect('user/login','refresh');
        }
    
    }

	public function index()
	{
		$data['judul'] = "PPOB | Penggunaan Listrik";
		$data['konten'] = "user/v_penggunaan";
		$this->load->view('v_template', $data);
	}

	public function tagihan()
	{
		$data['judul'] = "PPOB | Tagihan Listrik";
		$data['konten'] = "user/v_tagihan";
		$this->load->view('v_template', $data);
	}

	public function pembayaran()
	{
		$data['judul'] = "PPOB | Pembayaran Listrik";
		$data['konten'] = "user/v_pembayaran";
		$this->load->view('v_template', $data);
	}

	public function riwayat()
	{
		$data['judul'] = "PPOB | Riwayat Pembayaran Listrik";
		$data['konten'] = "user/v_riwayat";
		$this->load->view('v_template', $data);
	}

	public function profil($id)
	{
		$data['judul'] = "PPOB | Profil User";
		$data['konten'] = "user/v_profil";
		$data['getDataUser'] = $this->user->data_user($id);
		$this->load->view('v_template', $data);
	}

	public function logout_user()
    {    
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Sukses Keluar Akun');
        redirect('user/login','refresh');
	}
	
	public function logout_admin()
    {    
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Sukses Keluar Akun');
        redirect('admin/login','refresh');
    }

}
