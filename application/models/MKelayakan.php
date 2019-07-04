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
}