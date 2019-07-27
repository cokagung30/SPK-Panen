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
        $this->load->model('MKeputusan', 'keputusan');
        $this->load->model('MKelayakan', 'kelayakan');
        $this->load->library('pdf');
    }

    public function index()
    {
        $kondisi = $this->session->userdata('kondisi');
        if ($kondisi == "Berhasil Login"){
            $data['halaman'] = "data_ayam";
            $data['dataKandang'] = $this->dataAyam->getDataAyam($this->session->userdata('id_periode_kandang'));
            $data['jumlahData'] = $this->dataAyam->hitungJumlahHari($this->session->userdata('id_periode_kandang'));
            $data['dataKeputusan'] = $this->keputusan->selectDataKeputusan($this->session->userdata('id_periode_kandang'));
            $data['keputusan'] = $this->keputusan->selectDataKeputusan($this->session->userdata('id_periode_kandang'));
            $this->load->view('pemilik_kandang/body/data_ayam', $data);
        } else {
            redirect(base_url()."pemilik_kandang/Login/index");
        }

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
        if ($insertDataAyam > 0) {
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "pemilik_kandang/Data_ayam/index");
        }

    }

    public function jumlahFcr($jml_pakan, $berat_rata)
    {
        $jml_pakan_sum = $this->dataAyam->getSumPakan($this->session->userdata('id_periode'));
        foreach ($jml_pakan_sum->result() as $item) {
            $pakan = $item->jml_pakan;
            $fcr = (($pakan + $jml_pakan) / $berat_rata) * 10;
        }

        return $fcr;
    }

    public function mortalitas($jml_mati)
    {
        $jml_mati1 = $this->dataAyam->getJumlahMati($this->session->userdata('id_periode'));
        $volume = $this->session->userdata('volume');
        foreach ($jml_mati1->result() as $item1) {
            $mati = $item1->jml_mati + $jml_mati;
            $mortalitas = (($mati / $volume)) * 100;
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

        $ip = (((($ayam_hidup / $volume) * $berat_rata) / ($umur * $fcr))) * 10;
        return $ip;
    }

    /**
     * @param $id_periode
     */
    public function nilaiNormalisasi($id_periode)
    {
        $perhitungan = $this->dataAyam->getPerhitungan($id_periode);
        $data = $this->dataAyam->getLastData($id_periode);
        foreach ($data->result() as $item) {
            $fcrvalue = $item->fcr;
            $ipValue = $item->ip;
            $mortalitasValue = $item->mortalitas;
            $hargaValue = $item->harga;
        }

        foreach ($perhitungan->result() as $value) {
            $fcrEnd = $value->fcr;
            $ipEnd = $item->ip;
            $mortalitasEnd = $item->mortalitas;
            $hargaEnd = $item->harga;
        }

        $normalisasiIP = $this->normalisasiIP($ipEnd, $ipValue);
        $normalisasiFCR = round($this->normalisasiFCR($fcrEnd, $fcrvalue), 2);
        $normalisasiMortalitas = round($this->normalisasiMortalitas($mortalitasEnd, $mortalitasValue), 2);
        $normalisasiHarga = round($this->normalisasiHarga($hargaEnd, $hargaValue), 2);
        $preferensi = round($this->prefrensi($normalisasiIP, $normalisasiFCR, $normalisasiMortalitas, $normalisasiHarga), 2);

        $kelayakan = $this->kelayakan->getKelayakan($preferensi);
        foreach ($kelayakan->result() as $item) {
            $status = $item->id_kelayakan;
        }


        $kelayakan = $this->kelayakan->getKelayakan($preferensi);
        foreach ($kelayakan->result() as $item) {
            $status = $item->id_kelayakan;
        }


        $data = array(
            'id_periode' => $this->session->userdata('id_periode_kandang'),
            'id_kelayakan' => $status,
            'n_harga' => $normalisasiHarga,
            'n_ip' => $normalisasiIP,
            'n_fcr' => $normalisasiFCR,
            'n_mortalitas' => $normalisasiMortalitas,
            'preferensi' => $preferensi,
        );

        $insert = $this->keputusan->insertDataKeputusan($data);
        if ($insert > 0) {
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "pemilik_kandang/Data_ayam/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "pemilik_kandang/Data_ayam/index");
        }

    }

    public function normalisasiIP($ipEnd, $ipValue)
    {
        $output = $ipEnd / $ipValue;
        return $output;
    }

    public function normalisasiFCR($fcrEnd, $fcrValue)
    {
        $output = $fcrEnd / $fcrValue;
        return $output;
    }

    public function normalisasiMortalitas($mortalitasEnd, $mortalitasVlue)
    {
        $output = $mortalitasVlue / $mortalitasEnd;
        return $output;
    }

    public function normalisasiHarga($hargaEnd, $hargaValue)
    {
        $output = $hargaEnd / $hargaValue;
        return $output;
    }

    public function prefrensi($normalisasiIP, $normalisasiFCR, $normalisasiMortalitas, $normalisasiHarga)
    {
        $prefrensi = ($normalisasiIP * 0.4) + ($normalisasiFCR * 0.3) + ($normalisasiMortalitas * 0.1) + ($normalisasiHarga * 0.2);
        return $prefrensi;
    }

    public function deleteKeputusan()
    {
        $id_keputusan = $this->input->post('id_keputusan');
        $delete = $this->keputusan->deleteKeputusan($id_keputusan);
        if ($delete > 0) {
            redirect(base_url()."pemilik_kandang/data_ayam/index");
        } else {
            redirect(base_url()."pemilik_kandang/data_ayam/index");
        }
    }

    public function pdfGenerate($periode){
        $data['dataKandang'] = $this->dataAyam->getDataAyam($periode);
        $this->pdf->generate('pemilik_kandang/report/data_ayam', $data, 'laporan');
    }
}