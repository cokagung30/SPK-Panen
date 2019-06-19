<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 6/11/2019
 * Time: 9:14 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class DataAyam extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['halaman'] = "data ayam";
            $this->load->view('pemilik_kandang/body/dataAyam', $data);
        }else{
            redirect(base_url().'pemilik_kandang/Login/index');
        }
    }
}