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
        $this->load->model('MPegawai', 'pegawai');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi_pegawai') == "Berhasil Login") {
            redirect(base_url() . "pegawai/Dashboard_pegawai/index");
        } else {
            $data['halaman'] = "login";
            $this->load->view('pegawai/body/login_pegawai', $data);
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $loginPegawai = $this->pegawai->loginPegawai($username, $password);
        $result = $loginPegawai->num_rows();

        if ($result > 0) {
            $status = "Berhasil Login";
            foreach ($loginPegawai->result() as $data) {
                $session_data = array(
                    'id_pegawai' => $data->id_pegawai,
                    'nama_pegawai' => $data->nama_pegawai,
                    'no_telp_pegawai' => $data->no_telp,
                    'username_pegawai' => $data->username,
                    'id_kandang' => $data->id_kandang,
                    'level_pegawai' => "2",
                    'kondisi_pegawai' => $status
                );
                $this->session->set_userdata($session_data);
            }
            redirect(base_url() . "pegawai/Dashboard_pegawai/index");
        } else {

            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . "pegawai/Login/index");
        }
    }

    public function logout()
    {
        $data = array(
          'id_pegawai', 'nama_pegawai', 'id_kandang', 'username','level_pegawai', 'kondisi_pegawai'
        );
        $this->session->unset_userdata($data);
        redirect(base_url() . 'pegawai/login/index');

    }

}