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
        $this->load->model('MPemilikKandang', 'pemilik');
        $this->load->model('MPegawai', 'pegawai');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == "Berhasil Login") {
            redirect(base_url() . "pemilik_kandang/Dashboard/index");
        } else {
            $data['halaman'] = "login";
            $this->load->view('pemilik_kandang/body/login_pemilik', $data);
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $loginPemilik = $this->pemilik->loginPemilik($username, $password);
        $result = $loginPemilik->num_rows();

        if ($result > 0) {
            $status = "Berhasil Login";
            foreach ($loginPemilik->result() as $data) {
                $session_data = array(
                    'id_user' => $data->id_pemilik_kandang,
                    'nama_user' => $data->nama_pemilik_kandang,
                    'no_telp' => $data->no_telp,
                    'email' => $data->email,
                    'username' => $data->username,
                    'level' => "1",
                    'kondisi' => $status
                );
                $this->session->set_userdata($session_data);
            }
            redirect(base_url() . "pemilik_kandang/Dashboard/index");
        } else {

            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . "pemilik_kandang/Login/index");
        }
    }

    public function logout()
    {
        $session_data = array(
            'id_user', 'nama_user', 'level', 'kondisi'
        );

        $this->session->unset_userdata($session_data);
        redirect(base_url() . 'pemilik_kandang/login/index');
    }
    public function updatePemilik(){
        $id_pemilik_kandang = $this->input->post('id_pemilik_kandang');

        $data = array(
            'nama_pemilik_kandang' => $this->input->post('nama_pemilik_kandang'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username')
        );

        $update = $this->pemilik->updatePemilik($id_pemilik_kandang, $data);
        if ($update > 0) {
            $this->session->set_flashdata('pesan', 'updated');
            redirect(base_url() . "pemilik_kandang/Login/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "pemilik_kandang/Login/index");
        }
    }

}