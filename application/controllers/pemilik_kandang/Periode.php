<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kandangs', 'kandang');
        $this->load->model('PeriodeModel', 'periode');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['halaman'] = "periode";
            $data['periode'] = $this->periode->getAllPeriode($this->session->userdata('id_user'));
            $data['kandang'] = $this->kandang->tampilKandang($this->session->userdata('id_user'));
            $this->load->view('pemilik_kandang/body/periode', $data);
        } else {
            redirect(base_url() . 'pemilik_kandang/Login/index');
        }
    }

    public function tambahPeriode()
    {
        $id_kandang = $this->input->post('nama_kandang');
        $jumlah = $this->periode->getLastNomorPeriode($id_kandang);
        $nomor = 0;

        foreach ($jumlah->result_array() as $data) {
            $nomor = $data['nomor_periode'];
        }

        $nomor_insert = $nomor + 1;

        $data = array(
            'nomor_periode' => $nomor_insert,
            'id_kandang' => $id_kandang,
            'keterangan' => $this->input->post('keterangan')
        );

        $insert = $this->periode->tambahKandang($data);
        if ($insert > 0) {
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "pemilik_kandang/Periode/index");
        } else {
            $this->session->set_flashdata('pesan', 'gagal');
            redirect(base_url() . "pemilik_kandang/Periode/index");
        }

    }

    public function tampilVolume()
    {
        $id_kandang = $this->input->post('id_kandang');
        $volume = $this->kandang->tampilVolumeKandang($id_kandang);
        echo json_encode($volume);
    }

    public function deletePeriode()
    {
        $nomor_perioder = $this->input->post('nomor');
        $id_periode = $this->input->post('id_periode');
        $id_kandang = $this->input->post('kandang');
        $this->periode->deletePeriode($id_periode);
        $this->periode->updateNomorPeriode($nomor_perioder, $id_kandang);
    }

    public function editPeriode()
    {
        $id_periode = $this->input->post('id_kandang');
        $data = array(
            'keterangan' => $this->input->post('keterangan')
        );

        $update = $this->periode->updatePeriode($id_periode, $data);
        if ($update > 0) {
            $this->session->set_flashdata('pesan', 'updated');
            redirect(base_url() . "pemilik_kandang/Periode/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "pemilik_kandang/Periode/index");
        }
    }

}