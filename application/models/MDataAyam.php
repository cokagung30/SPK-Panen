<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 6/4/2019
 * Time: 11:28 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MDataAyam extends CI_Model{

    public function getSumPakan($id_periode){
        $this->db->select_sum('jml_pakan');
        $this->db->where('id_periode', $id_periode);
        return $this->db->get('data_ayam');
    }

    public function getJumlahMati($id_periode){
        $this->db->select_sum('jml_mati');
        $this->db->where('id_periode', $id_periode);
        return $this->db->get('data_ayam');
    }

    public function insertDataAyam($data){
        $this->db->insert('data_ayam', $data);
        return $this->db->affected_rows();
    }

}