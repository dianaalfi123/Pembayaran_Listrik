<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function masuk(){
        $nama_pelanggan=$this->input->post('nama_pelanggan');
        $alamat=$this->input->post('alamat');
        $nomor_kwh=$this->input->post('nomor_kwh');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $datasimpan=array(
            'nama_pelanggan'=>$nama_pelanggan,
            'alamat'=>$alamat,
            'nomor_kwh'=>$nomor_kwh,
            'username'=>$username,
            'password'=>$password,
            'id_tarif'=>"1"
        );
        $this->db->insert('pelanggan',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }  
    
    public function get_login(){
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        return $this->db->get();
    }  

    public function get_tarif(){
        $this->db->select('*');
        $this->db->from('tarif');
        return $this->db->get();
    }  

    public function data_user($a)
	{
        return $this->db
                    ->where('id_pelanggan', $a)
                    ->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
                    ->get('pelanggan')
                    ->result();
    }


}

?>