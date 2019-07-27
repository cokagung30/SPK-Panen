<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPengajuan', 'pengajuan');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['halaman'] = "pengajuan";
            $id_pemilik = $this->session->userdata('id_user');
            $data['sql1'] = $this->loadRealtime($id_pemilik);
            $this->load->view('pemilik_kandang/body/pengajuan', $data);
        } else {
            redirect(base_url() . 'pemilik_kandang/Login/index');
        }
    }

    public function deletePengajuan()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $this->MPengajuan->deletePengajuan($id_pengajuan);
    }

    public function kirimPengajuan(){
        $data = array(
            'id_pemilik_kandang' => $this->input->post('id_pemilik_kandang'),
            'id_data_ayam' => $this->input->post('id_data_ayam'),
            'verifikasi' => $this->input->post('id_keputusan'),
            'status_pengajuan' => '0'
        );
        $this->pengajuan->insertPengajuan($data);
    }

    public function loadRealtime($id_akses){
       $data = $this->pengajuan->tampilPengajuan($id_akses);
       return $data;

    }
}