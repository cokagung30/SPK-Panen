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
        if ($this->session->userdata('kondisi_ppl') == "Berhasil Login PPL") {
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
            $status = "Berhasil Login PPL";
            foreach ($loginPpl->result() as $data) {
                $session_data_ppl = array(
                    'status_login_ppl' => $status,
                    'id_ppl' => $data->id_ppl,
                    'nama_ppl' => $data->nama_ppl,
                    'no_telp_ppl' => $data->no_telp,
                    'alamat_ppl' => $data->alamat,
                    'username_ppl' => $data->username,
                    'password_ppl' => $data->password,
                );
                $this->session->set_userdata($session_data_ppl);
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
            'status_login_ppl', 'id_ppl', 'nama_ppl',
            'no_telp_ppl', 'alamat_ppl', 'username_ppl', 'password_ppl'
        );
        $this->session->unset_userdata($data);
        redirect(base_url() . 'ppl/login/index');

    }

    public function updateppl()
    {
        $id_ppl = $this->input->post('id_ppl');

        $data = array(
            'nama_ppl' => $this->input->post('nama_ppl'),
            'no_telp' => $this->input->post('no_telp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
        );

        $update = $this->ppl->updateppl($id_ppl, $data);

        if ($update > 0) {
            $value = array(
                'id_ppl' => $id_ppl,
                'nama_ppl' => $this->input->post('nama_ppl'),
                'no_telp_ppl' => $this->input->post('no_telp'),
                'username_ppl' => $this->input->post('username'),
                'password_ppl' => $this->input->post('password'),
                'alamat_ppl' => $this->input->post('alamat')
            );
            $this->session->set_flashdata('messeage_ppl', 'updated');
            $this->session->set_userdata($value);
            redirect(base_url() . "ppl/Dashboard_ppl/index");
        } else {
            $this->session->set_flashdata('messeage_ppl', 'failure');
            redirect(base_url() . "ppl/Dashboard_ppl/index");
        }

    }

}