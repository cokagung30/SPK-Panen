<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/18/2019
 * Time: 10:56 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class MPpl extends CI_Model{
    public function tampilPpl(){
        return $this->db->get('ppl');
    }
    public function loginPpl($username, $password){
        return $this->db->get_where('ppl', array('username' => $username, 'password'=> $password));
    }

}