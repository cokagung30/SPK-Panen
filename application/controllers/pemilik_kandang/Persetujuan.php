<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPengajuan', 'pengajuan');
        $this->load->library('pdf');
    }
    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $this->pengajuan->refresh_pemilik();
            $data['halaman'] = "persetujuan";
            $id_user = $this->session->userdata('id_user');
            $data['sql1'] = $this->pengajuan->tampilPengajuan3($id_user);
            $data['jumlah'] = $this->pengajuan->getMaxPeriode($id_user);
            $this->load->view('pemilik_kandang/body/persetujuan', $data);
        } else {
            redirect(base_url() . 'pemilik_kandang/Login/index');
        }
    }

    public function reports($id_pengajuan){
        $id_user = $this->session->userdata('id_user');
        $fetch = $this->pengajuan->fetchPengajuan($id_user, $id_pengajuan);
        $data['sql1'] = $fetch->result();
        $column = $fetch->row();
        $judul = "lapora-periode-".$column->keterangan;
        $this->pdf->generate('pemilik_kandang/report/persetujuan', $data, $judul);
    }
    public function notif_pemilik(){
        $notif_pemilik = $this->pengajuan->notif_pemilik();
        echo json_encode($notif_pemilik);
    }
}