<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/17/2019
 * Time: 9:35 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class PemilikKandang extends CI_Model{

    public function tambahPemilik($data){
        $this->db->insert('pemilik_kandang', $data);
        return $this->db->affected_rows();
    }

    public function loginPemilik($username, $password){
        return $this->db->get_where('pemilik_kandang', array('username' => $username, 'password'=> $password));
    }
}