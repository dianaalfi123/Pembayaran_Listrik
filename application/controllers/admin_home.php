<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_home extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->model('m_admin','admin');
        if ($this->session->userdata('login')!=TRUE) {
                redirect('admin/login','refresh');
        }
    }

    public function tarif()
    {
        $data['DataTarif'] = $this->admin->getDataTarif();
        $data['judul'] = "PPOB | Halaman Tarif";
				$data['konten'] = "admin/va_tarif";
				$this->load->view('v_template', $data);
    }

     public function tambah_tarif()
    {
        if($this->input->post('tambah')){
            $this->admin->tambah_tarif();
            $this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Tarif');
            redirect('admin_home/tarif');
        }
    }

		    public function data_tarif($id){
				$data=$this->admin->data_tarif($id);
				echo json_encode($data);
    }

    public function hapus_tarif()
    {
        $this->admin->hapus_tarif();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Tarif');
				redirect('admin_home/tarif');
    }

    public function aktif_tarif()
    {
      $this->admin->aktif_tarif();
			$this->session->set_flashdata('pesan_sukses', 'Sukses Mengaktifkan Tarif');
			redirect('admin_home/tarif');
    }

    public function nonaktif_tarif()
    {
        $this->admin->nonaktif_tarif();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menonaktifkan Tarif');
				redirect('admin_home/tarif');
    }

    public function edit_tarif()
    {
        $this->admin->edit_tarif();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Tarif');
				redirect('admin_home/tarif');
    }


    public function pelanggan()
    {
        $data['DataPelanggan'] = $this->admin->getDataPelanggan();
        $data['DataTarif'] = $this->admin->getDataTarif();
        $data['judul'] = "PPOB | Halaman Data Pelanggan";
				$data['konten'] = "admin/v_pelanggan";
				$this->load->view('v_template', $data);
    }

		    public function data_pelanggan($id){
				$data=$this->admin->data_pelanggan($id);
				echo json_encode($data);
    }

    public function tambah_pelanggan(){
				$data=$this->admin->tambah_pelanggan();
		    $this->session->set_flashdata('pesan_sukses', 'Sukses Menambahkan Data Pelanggan');
				redirect('admin_home/pelanggan');
    }

    public function edit_pelanggan()
    {
      $this->admin->edit_pelanggan();
			$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Pelanggan');
			redirect('admin_home/pelanggan');
    }



}

?>
