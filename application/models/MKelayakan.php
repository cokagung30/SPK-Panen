<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 6/30/2019
 * Time: 4:03 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MKelayakan extends CI_Model{

    public function getKelayakan($prefrensi){
        $query = $this->db->query("SELECT * FROM kelayakan WHERE $prefrensi BETWEEN batas_atas AND batas_bawah");
        return $query;
    }
    public function tampilKelayakan()
    {
        return $this->db->get('kelayakan');
    }

    public function updateKelayakan($id_kelayakan, $data)
    {
        $this->db->where('id_kelayakan', $id_kelayakan);
        $this->db->update('kelayakan', $data);
        return $this->db->affected_rows();
    }
}
