<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Ayam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDataAyam', 'dataAyam');
    }

    public function index()
    {
        $data['halaman'] = "data_ayam";
        $data['dataKandang'] = $this->dataAyam->getDataAyam($this->session->userdata('id_periode_kandang'));
        $this->load->view('pemilik_kandang/body/data_ayam', $data);
    }

    public function insertDataAyam()
    {
        $id_periode = $this->session->userdata('id_periode');
        $umur = $this->input->post('umur');
        $jml_mati = $this->input->post('jumlahmati');
        $berat_rata = $this->input->post('beratrata');
        $jml_pakan = $this->input->post('jumlahpakan');
        $harga = $this->input->post('hargajual');
        $fcr = $this->jumlahFcr($jml_pakan, $berat_rata);
        $mortalitas_ayam = $this->mortalitas($jml_mati);
        $ip = $this->hasilIp($jml_mati, $berat_rata, $umur, $fcr);


        $data = array(
            'id_periode' => $id_periode,
            'umur' => $umur,
            'jml_mati' => $jml_mati,
            'berat_rata' => $berat_rata,
            'jml_pakan' => $jml_pakan,
            'harga' => $harga,
            'ip' => round($ip, 3),
            'fcr' => round($fcr, 3),
            'mortalitas' => round($mortalitas_ayam, 3),
            'id_kelayakan' => 1
        );

        $insertDataAyam = $this->dataAyam->insertDataAyam($data);
        if ($insertDataAyam > 0){
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "pemilik_kandang/Data_ayam/index");
        }

    }

    public function jumlahFcr($jml_pakan, $berat_rata)
    {
        $jml_pakan_sum = $this->dataAyam->getSumPakan($this->session->userdata('id_periode'));
        foreach ($jml_pakan_sum->result() as $item) {
            $pakan = $item->jml_pakan;
            $fcr = (($pakan + $jml_pakan) / $berat_rata)*10;
        }

        return $fcr;
    }

    public function mortalitas($jml_mati)
    {
        $jml_mati1 = $this->dataAyam->getJumlahMati($this->session->userdata('id_periode'));
        $volume = $this->session->userdata('volume');
        foreach ($jml_mati1->result() as $item1) {
            $mati = $item1->jml_mati + $jml_mati;
            $mortalitas = (($mati / $volume))*100;
        }
        return $mortalitas;
    }

    public function hasilIp($jml_mati, $berat_rata, $umur, $fcr)
    {
        $jml_mati1 = $this->dataAyam->getJumlahMati($this->session->userdata('id_periode'));
        $volume = $this->session->userdata('volume');
        foreach ($jml_mati1->result() as $item1) {
            $mati = $item1->jml_mati + $jml_mati;
            $ayam_hidup = ($volume - $mati);
        }

        $ip = (((($ayam_hidup/$volume) * $berat_rata) / ($umur * $fcr)))*10;
        return $ip;
    }
}