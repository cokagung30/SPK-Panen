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
        if ($this->session->userdata('status_login_ppl') == 'Berhasil Login PPL') {
            $this->pengajuan->refresh();
            $data['halaman'] = "pengajuan";
            $data['sql1'] = $this->pengajuan->tampilPengajuan1($this->session->userdata('id_ppl'));
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

    public function kirimPengajuan()
    {
        $data = array(
            'id_ppl' => $this->input->post('id_ppl'),
            'id_data_ayam' => $this->input->post('id_data_ayam'),
            'verifikasi' => "Belum Terverifikasi"
        );
        $this->pengajuan->insertPengajuan1($data);
    }

    public function ViewPengajuan()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');

        $data = array(
            'umur' => $this->input->post('umur'),
            'id_ppl' => $this->input->post('nama_ppl'),
            'lokasi' => $this->input->post('alamatKandang'),
            'volume' => $this->input->post('volumeKandang')
        );
    }

    public function deleteKandang()
    {
        $id_kandang = $this->input->post('id_kandang');
        $this->kandangs->deleteKandang($id_kandang);
    }

    public function updatePengajuan()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');

        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'umur' => $this->input->post('umur'),
            'fcr' => $this->input->post('fcr'),
            'mortalitas' => $this->input->post('mortalitas'),
            'ip' => $this->input->post('ip'),
            'status_kelayakan' => $this->input->post('status_kelayakan')
        );

        $update = $this->pengajuan->updatePengajuan($id_pengajuan, $data);
        if ($update > 0) {
            $this->session->set_flashdata('pesan', 'updated');
            redirect(base_url() . "ppl/Pengajuan/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "ppl/Pengajuan/index");
        }

    }

    public function aprovePengajuan($id_pengajuan){
        $catatan = $this->input->post('catatan');
        $pengajuan = $this->input->post('persetujuan');

        $status = 0;
        if ($pengajuan != "Setuju"){
            $status = 1;
        } else {
            $status = 2;
        }
        $data = array(
            'status_pengajuan' => $status,
            'catatan' => $catatan,
            'notif_pemilik' => '1'
        );

        $update = $this->pengajuan->updatePengajuan($id_pengajuan, $data);
        if ($update > 0){
            $this->session->set_flashdata('approve', 'approved');
            redirect(base_url()."ppl/pengajuan/index");
        } else {
            $this->session->set_flashdata('approve', 'not_approved');
            redirect(base_url()."ppl/pengajuan/index");
        }
    }
    public function notif(){
        $notif= $this->pengajuan->notif();
        echo json_encode($notif);
    }
}