<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/18/2019
 * Time: 10:56 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Kandangs extends CI_Model{

    public function tambahKandang($data){
        $this->db->insert('kandang', $data);
        return $this->db->affected_rows();
    }

    public function tampilKandang($id_user){
        return $this->db->get_where('kandang', array('id_pemilik_kandang' => $id_user));
    }

    public function tampilVolumeKandang($id_kandang){
        return $this->db->get_where('kandang', array('id_kandang' => $id_kandang));
    }

    public function deleteKandang($id_kandang) {
        $this->db->delete('kandang', array('id_kandang' => $id_kandang));
    }

    public function updateKandang($id_kandang, $data){
        $this->db->where('id_kandang', $id_kandang);
        $this->db->update('kandang', $data);
        return $this->db->affected_rows();
    }
}