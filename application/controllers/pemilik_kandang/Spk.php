<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->view('pemilik_kandang/body/spk');
    }
}