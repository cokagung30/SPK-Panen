<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login')
        {
            $data['halaman'] = "dashboard";
            $this->load->view('pemilik_kandang/body/dashboard', $data);
        } else{
            redirect(base_url().'pemilik_kandang/Login/index');
        }

    }

}