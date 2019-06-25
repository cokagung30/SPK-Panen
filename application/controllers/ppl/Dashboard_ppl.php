<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ppl extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['halaman'] = "dashboard_ppl";
        $this->load->view('ppl/body/dashboard_ppl', $data);
    }
}