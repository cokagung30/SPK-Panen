<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['halaman'] = "dashboard_admin";
        $this->load->view('admin/body/dashboard_admin');
    }
}