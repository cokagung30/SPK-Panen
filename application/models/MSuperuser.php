<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/18/2019
 * Time: 10:56 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class MSuperuser extends CI_Model{

    public function loginsuper($username, $password){
        return $this->db->get_where('superuser', array('username' => $username, 'password'=> $password));
    }

}
