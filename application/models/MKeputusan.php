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

}