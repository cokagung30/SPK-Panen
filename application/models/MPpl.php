<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/18/2019
 * Time: 10:56 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class MPpl extends CI_Model{
    public function tampilPpl($id_pemilik){
        $this->db->select('ppl.*');
        $this->db->join('pemilik_kandang', 'ppl.id_ppl = pemilik_kandang.id_ppl');
        return $this->db->get_where('ppl', array('pemilik_kandang.id_pemilik_kandang' => $id_pemilik));
    }
    public function loginPpl($username, $password){
        return $this->db->get_where('ppl', array('username' => $username, 'password'=> $password));
    }
    public function updateppl($id_ppl, $data){
        $this->db->where('id_ppl', $id_ppl);
        $this->db->update('ppl', $data);
        return $this->db->affected_rows();
    }
    public function tambahPpl($id_ppl){
        $this->db->insert('ppl');
        return $this->db->affected_rows();
    }
}
