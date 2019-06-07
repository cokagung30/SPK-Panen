<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kandangs', 'kandangs');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['halaman'] = "kandang";
            $data['sql1'] = $this->kandangs->tampilKandang($this->session->userdata('id_user'));
            $this->load->view('pemilik_kandang/body/kandang', $data);
        } else {
            redirect(base_url() . 'pemilik_kandang/Login/index');
        }
    }

    public function insertKandang()
    {
        $data = array(
            'id_pemilik_kandang' => $this->session->userdata('id_user'),
            'nama_kandang' => $this->input->post('namaKandang'),
            'lokasi' => $this->input->post('alamatKandang'),
            'volume' => $this->input->post('volumeKandang')
        );

        $process = $this->kandangs->tambahKandang($data);
        if ($process > 0) {
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "pemilik_kandang/Kandang/index");
        }
    }

    public function deleteKandang()
    {
        $id_kandang = $this->input->post('id_kandang');
        $this->kandangs->deleteKandang($id_kandang);
    }

    public function updateKandang()
    {
        $id_kandang = $this->input->post('id_kandang');

        $data = array(
            'nama_kandang' => $this->input->post('namaKandang'),
            'lokasi' => $this->input->post('alamatKandang'),
            'volume' => $this->input->post('volumeKandang')
        );

        $update = $this->kandangs->updateKandang($id_kandang, $data);
        if ($update > 0) {
            $this->session->set_flashdata('pesan', 'updated');
            redirect(base_url() . "pemilik_kandang/Kandang/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "pemilik_kandang/Kandang/index");
        }
    }
}