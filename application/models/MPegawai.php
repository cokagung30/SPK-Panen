<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/18/2019
 * Time: 9:09 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MPegawai extends CI_Model
{
    public function tampilPegawai($id_user){
        $this->db->select('pegawai.*, kandang.*');
        $this->db->from('pegawai');
        $this->db->join('kandang', 'kandang.id_kandang = pegawai.id_kandang');
        $this->db->where('kandang.id_pemilik_kandang', $id_user);
        return $this->db->get();
    }
    public function tambahPegawai($data)
    {
        $this->db->insert('pegawai', $data);
        return $this->db->affected_rows();
    }
    public function deletePegawai($id_pegawai) {
        $this->db->delete('pegawai', array('id_pegawai' => $id_pegawai));
    }

    public function updatePegawai($id_pegawai, $data){
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai', $data);
        return $this->db->affected_rows();
    }

    public function loginPegawai($username, $password){
        return $this->db->get_where('pegawai', array('username' => $username, 'password'=> $password));
    }
}