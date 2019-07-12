<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 6/30/2019
 * Time: 3:40 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MKeputusan extends CI_Model {

    public function insertDataKeputusan($data){
        $this->db->insert('keputusan', $data);
        return $this->db->affected_rows();
    }

    public function selectDataKeputusan($idPeriode){
        $this->db->select('keputusan.*, kelayakan.*');
        $this->db->join('kelayakan','keputusan.id_kelayakan = kelayakan.id_kelayakan');
        return $this->db->get_where('keputusan', array('id_periode' => $idPeriode));
    }

    public function deleteKeputusan($idKeputusan){
        $this->db->delete('keputusan', array('id_keputusan' => $idKeputusan));
        return $this->db->affected_rows();
    }
}