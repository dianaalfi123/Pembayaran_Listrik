<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function get_login(){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        return $this->db->get();
    }

    public function getDataTarif(){
        $this->db->select('*');
        $this->db->from('tarif');
        return $this->db->get()->result();
    }

    public function tambah_tarif(){
        $nama_tarif=$this->input->post('nama_tarif');
        $daya=$this->input->post('daya');
        $terperkwh=$this->input->post('terperkwh');
        $beban=$this->input->post('beban');
        $denda=$this->input->post('denda');
        $datasimpan=array(
            'nama_tarif'=>$nama_tarif,
            'daya'=>$daya,
            'terperkwh'=>$terperkwh,
            'beban'=>$beban,
            'denda'=>$denda,
            'status'=> "Aktif"
        );
        $this->db->insert('tarif',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function data_tarif($a)
	{
        return $this->db
                    ->where('id_tarif', $a)
                    ->get('tarif')
                    ->row();
    }

    public function hapus_tarif(){
        $this->db->where('id_tarif', $this->input->post('id_tarif'));
        $this->db->delete('tarif');
    }

    public function aktif_tarif(){

        $data = array(
            'status' => "Aktif"
        );

        $this->db->where('id_tarif', $this->input->post('id_tarif'))
                 ->update('tarif', $data);
    }

    public function nonaktif_tarif(){
        $data = array(
            'status' => "Non Aktif"
        );

        $this->db->where('id_tarif', $this->input->post('id_tarif'))
                 ->update('tarif', $data);
    }

    public function edit_tarif()
    {
        $data = array(
            'nama_tarif' => $this->input->post('nama_tarif'),
            'daya'=>$this->input->post('daya'),
            'terperkwh'=>$this->input->post('terperkwh'),
            'beban'=>$this->input->post('beban'),
            'denda'=>$this->input->post('denda')
        );

        return $this->db->where('id_tarif', $this->input->post('id_tarif'))
                    ->update('tarif', $data);
    }

    public function getDataPelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif');
        return $this->db->get()->result();
    }

    public function data_pelanggan($a)
	{
        return $this->db
                    ->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
                    ->where('id_pelanggan', $a)
                    ->get('pelanggan')
                    ->row();
    }

    public function tambah_pelanggan(){
        $nama_pelanggan=$this->input->post('nama_pelanggan');
        $nomor_kwh=$this->input->post('nomor_kwh');
        $alamat=$this->input->post('alamat');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $id_tarif=$this->input->post('id_tarif');
        $datasimpan=array(
            'nama_pelanggan'=>$nama_pelanggan,
            'nomor_kwh'=>$nomor_kwh,
            'alamat'=>$alamat,
            'username'=>$username,
            'password'=>$password,
            'id_tarif'=>$id_tarif,
            'status_pelanggan'=> "Aktif"
        );
        $this->db->insert('pelanggan',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit_pelanggan()
    {
        $nama_pelanggan=$this->input->post('nama_pelanggan');
        $nomor_kwh=$this->input->post('nomor_kwh');
        $alamat=$this->input->post('alamat');
        $username=$this->input->post('username');
        $id_tarif=$this->input->post('id_tarif');
        $datasimpan=array(
            'nama_pelanggan'=>$nama_pelanggan,
            'nomor_kwh'=>$nomor_kwh,
            'alamat'=>$alamat,
            'username'=>$username,
            'id_tarif'=>$id_tarif,
        );

        return $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))
                    ->update('pelanggan', $data);
    }

    public function getDataRiwayat()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif');
        return $this->db->get()->result();
    }



}

?>
