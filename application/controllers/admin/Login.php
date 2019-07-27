<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSuperuser', 'superuser');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi_super') == "Berhasil Login super") {
            redirect(base_url() . "admin/Dashboard_admin/index");
        } else {
            $data['halaman'] = "login";
            $this->load->view('admin/body/login_admin', $data);
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $loginsuper = $this->superuser->loginsuper($username, $password);
        $result = $loginsuper->num_rows();

        if ($result > 0){
            redirect(base_url() . "admin/Dashboard_admin/index");
        } else {
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . "admin/Login/index");
        }


    }
}