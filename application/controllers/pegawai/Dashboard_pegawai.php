<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_pegawai extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['halaman'] = "dashboard_pegawai";
        $this->load->view('pegawai/body/dashboard_pegawai', $data);
    }
}