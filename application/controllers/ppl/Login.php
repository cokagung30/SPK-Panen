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
        $this->load->model('MPpl', 'ppl');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi_ppl') == "Berhasil Login") {
            redirect(base_url() . "ppl/Dashboard_ppl/index");
        } else {
            $data['halaman'] = "login";
            $this->load->view('ppl/body/login_ppl', $data);
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $loginPpl = $this->ppl->loginPpl($username, $password);
        $result = $loginPpl->num_rows();

        if ($result > 0) {
            $status = "Berhasil Login";
            foreach ($loginPpl->result() as $data) {
                $session_data = array(
                    'kondisi' => $status,
                    'id_ppl' => $data->id_ppl,
                    'nama_ppl' => $data->nama_ppl
                );
                $this->session->set_userdata($session_data);
            }
            redirect(base_url() . "ppl/Dashboard_ppl/index");
        } else {

            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . "ppl/Login/index");
        }
    }

    public function logout()
    {
        $data = array(
          'id_ppl', 'nama_ppl', 'id_kandang', 'level_pegawai', 'kondisi_pegawai'
        );
        $this->session->unset_userdata($data);
        redirect(base_url() . 'ppl/login/index');

    }

}