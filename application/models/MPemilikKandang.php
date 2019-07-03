<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/17/2019
 * Time: 9:35 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MPemilikKandang extends CI_Model{

    public function tambahPemilik($data){
        $this->db->insert('pemilik_kandang', $data);
        return $this->db->affected_rows();
    }

    public function loginPemilik($username, $password){
        return $this->db->get_where('pemilik_kandang', array('username' => $username, 'password'=> $password));
    }

    public function getAllKandangByPpl($id_pll){
        $this->db->where('id_ppl',$id_pll);
        return $this->db->get('kandang');
    }

    public function updatePemilik($id_pemilik_kandang, $data){
        $this->db->where('id_pemilik_kandang', $id_pemilik_kandang);
        $this->db->update('pemilik_kandang', $data);
        return $this->db->affected_rows();
    }
}