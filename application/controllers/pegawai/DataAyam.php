<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/25/2019
 * Time: 6:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAyam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDataAyam', 'dataAyam');
    }

    public function updateDataAyam($id_data_ayam)
    {

        $id_periode = $this->session->userdata('id_periode');
        $umur = $this->input->post('umur');
        $tanggal = $this->input->post('tanggal');
        $jml_mati = $this->input->post('jumlahmati');
        $berat_rata = $this->input->post('beratrata');
        $jml_pakan = $this->input->post('jumlahpakan');
        $harga = $this->input->post('hargajual');

        $jml_mati_sebelumnya = $this->input->post('jm_mati_sebelumnya');
        $jml_pakan_sebelumnya = $this->input->post('jml_pakan_sebelumnya');
        $berat_rata_sebelumnya = $this->input->post('berat_rata_sebelumnya');

        if ($berat_rata != $berat_rata_sebelumnya) {
            $fcr = $this->updateFcr($id_data_ayam, $berat_rata);
        } else {
            $fcr = $this->input->post('fcr');
        }

        $ip = $this->hasilIpUpdate($berat_rata, $umur, $id_data_ayam);

        $data = array(
            'umur' => $umur,
            'tanggal' => $tanggal,
            'jml_mati' => $jml_mati,
            'jml_pakan' => $jml_pakan,
            'berat_rata' => $berat_rata,
            'fcr' => round($fcr, 3),
            'ip' => round($ip, 2),
            'harga' => $harga
        );

        $update = $this->dataAyam->updateDataAyam($id_data_ayam, $id_periode, $data);

        if ($update > 0) {
            $selisihMortalitas = $this->selisihUntukMortalitas($jml_mati, $jml_mati_sebelumnya);
            $selisihFcr = $this->selisihUntukFcr($jml_pakan, $jml_pakan_sebelumnya, $berat_rata);
            $updateData = round($this->dataAyam->updateDataMengurangi($selisihFcr, $selisihMortalitas, $id_data_ayam), 3);
            if ($updateData) {
                redirect(base_url() . "pegawai/Data_ayam/index");
            } else {
                redirect(base_url() . "pegawai/Data_ayam/index");
            }
        } else {
            redirect(base_url() . "pegawai/Data_ayam/index");
        }

    }

    public function selisihUntukMortalitas($jml_mati, $jml_mati_sebellumnya)
    {
        $selisihJmlMati = $jml_mati - $jml_mati_sebellumnya;
        $volume = $this->session->userdata('volume');
        $mortalitas = ($selisihJmlMati / $volume) * 100;

        return $mortalitas;
    }

    public function selisihUntukFcr($jml_pakan, $jml_pakan_sebelumnya, $berat_rata)
    {
        $selisihJmlPakan = $jml_pakan - $jml_pakan_sebelumnya;
        $fcr = ($selisihJmlPakan / $berat_rata) * 10;

        return $fcr;
    }

    public function updateFcr($id_data_ayam, $berat_rata)
    {
        $select = $this->dataAyam->getJmlMaxJmlPakan($id_data_ayam, $this->session->userdata('id_periode'));
        foreach ($select->result() as $item) {
            $jml_pakan = $item->jml_pakan;
        }
        $fcr = ($jml_pakan / $berat_rata) * 10;
        return $fcr;
    }

    public function hasilIpUpdate($berat_rata, $umur, $id_data_ayam)
    {
        $id_periode = $this->session->userdata('id_periode');
        $volume = $this->session->userdata('volume');

        $select = $this->dataAyam->getJmlMaxJmlPakan($id_data_ayam, $id_periode);
        foreach ($select->result() as $item) {

            $fcr = ($item->jml_pakan / $berat_rata)*10;

            $mati = $item->jml_mati;
            $ayam_hidup = $volume - $mati;

            $ip = ((($ayam_hidup/$volume)*$berat_rata)/($umur *$fcr))*10;
        }

        return $ip;
    }

}