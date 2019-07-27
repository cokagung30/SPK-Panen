<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik_kandang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPemilikKandang', 'pemilik_kandang');
    }

    public function index()
    {
        $id_ppl = $this->session->userdata('id_ppl');
        if ($this->session->userdata('status_login_ppl') == 'Berhasil Login PPL') {
            $data['halaman'] = "pemilik_kandang";
            $data['pemilik_kandang'] = $this->pemilik_kandang->tampilPemilikKandang($id_ppl);
            $this->load->view('ppl/body/pemilik_kandang', $data);
        } else {
            redirect(base_url() . 'ppl/Login/index');
        }
    }

    public function validation()
    {
        $this->form_validation->set_rules('namaUser', 'Nama Pemilik Kandang', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('emailAdress', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('repatPassword', 'Repaeat Password', 'required|matches[password]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run()) {
            $data = array(
                'nama_pemilik_kandang' => $this->input->post('namaUser'),
                'no_telp' => $this->input->post('noTelp'),
                'email' => $this->input->post('emailAdress'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'id_ppl' => $this->session->userdata('id_ppl')
            );
            $this->tambahPemilikKandang($data);
        } else {
            $this->formPemilik();
        }
    }

    public function tambahPemilikKandang($data)
    {
        $process = $this->pemilik_kandang->tambahPemilik($data);
        if ($process > 0) {
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "ppl/Pemilik_kandang/index");
        } else {
            $this->session->set_flashdata('pesan', 'gagal');
            redirect(base_url() . "ppl/Pemilik_kandang/index");
        }

    }

    public function viewPemilik()
    {
        $id_pemilik_kandang = $this->input->post('id_pemilik_kandang');

        $data = array(
            'nama_pemilik_kandang' => $this->input->post('nama_pemilik_kandang'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $update = $this->pemilik_kandang->viewPemilik($id_pemilik_kandang, $data);
        if ($update > 0) {
            $this->session->set_flashdata('pesan', 'updated');
            redirect(base_url() . "ppl/Pemilik_kandang/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "ppl/Pemilik_kandang/index");
        }
    }

    public function formPemilik(){
        if ($this->session->userdata('status_login_ppl') == 'Berhasil Login PPL') {
            $data['halaman'] = "pemilik_kandang";
            $this->load->view('ppl/body/tambah_pemilik', $data);
        } else {
            redirect(base_url() . 'ppl/Login/index');
        }

    }

}