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
            $data['sql1'] = $this->pengajuan->tampilPengajuan1($this->session->userdata('id_user'));
            $this->load->view('ppl/body/pengajuan', $data);
        } else {
            redirect(base_url() . 'ppl/Login/index');
        }
    }

    public function deletePengajuan()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $this->MPengajuan->deletePengajuan1($id_pengajuan);
    }

    public function kirimPengajuan(){
        $data = array(
            'id_ppl' => $this->input->post('id_ppl'),
            'id_data_ayam' => $this->input->post('id_data_ayam'),
            'verifikasi' => "Belum Terverifikasi"
        );
        $this->pengajuan->insertPengajuan1($data);
    }
    public function ViewPengajuan(){
        $id_pengajuan = $this->input->post('id_pengajuan');

        $data = array(
            'umur' => $this->input->post('umur'),
            'id_ppl' => $this->input->post('nama_ppl'),
            'lokasi' => $this->input->post('alamatKandang'),
            'volume' => $this->input->post('volumeKandang')
        );

    }

}