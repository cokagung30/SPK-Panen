<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawais', 'pegawais');
        $this->load->model('Kandangs', 'kandang');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['halaman'] = "pegawai";
            $data['sql1'] = $this->pegawais->tampilPegawai($this->session->userdata('id_user'));
            $data['kandang'] = $this->kandang->tampilKandang($this->session->userdata('id_user'));
            $this->load->view('pemilik_kandang/body/pegawai', $data);
        }else{
            redirect(base_url().'pemilik_kandang/Login/index');
        }
    }

    public function tambahPegawai()
    {
        $data = array(
            'id_kandang' => $this->input->post('nama_kandang'),
            'nama_pegawai' => $this->input->post('namaPegawai'),
            'no_telp' => $this->input->post('noTelp'),
            'username' => $this->input->post('Username'),
            'password' => $this->input->post('Password')
        );
        $process = $this->pegawais->tambahPegawai($data);
        if ($process > 0) {
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "pemilik_kandang/Pegawai/index");
        }
    }

    public function deletePegawai()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $this->pegawais->deletePegawai($id_pegawai);
    }

    public function editPegawai(){
        $id_pegawai = $this->input->post('id_pegawai');

        $data = array(
            'id_kandang' => $this->input->post('id_kandang'),
            'nama_pegawai' => $this->input->post('namaPegawai'),
            'username' => $this->input->post('Username'),
            'password' => $this->input->post('Password'),
            'no_telp' => $this->input->post('noTelp')
        );

        $update = $this->pegawais->updatePegawai($id_pegawai, $data);
        if ($update > 0){
            $this->session->set_flashdata('pesan', 'updated');
            redirect(base_url() . "pemilik_kandang/Pegawai/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "pemilik_kandang/Pegawai/index");
        }
    }
}