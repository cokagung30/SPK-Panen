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
    }

    public function index()
    {
        if ($this->session->userdata('status_login_ppl') == 'Berhasil Login PPL') {
            $this->pengajuan->refresh();
            $data['halaman'] = "persetujuan";
            $data['sql1'] = $this->pengajuan->tampilPengajuan2($this->session->userdata('id_ppl'));
            $this->load->view('ppl/body/persetujuan', $data);
        } else {
            redirect(base_url() . 'ppl/Login/index');
        }

    }
    public function pdfGenerate($id_pemilik_kandang){
        $data['persetujuanPanen'] = $this->pengajuan->tampilPengajuan3($id_pemilik_kandang);
        $this->pdf->generate('pemilik_kandang/report/persetujuan', $data, 'laporan');
    }

}