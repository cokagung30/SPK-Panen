<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/25/2019
 * Time: 6:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAyam extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDataAyam', 'dataAyam');
    }

    public function updateDataAyam($id_data_ayam){
//        $id_periode = $this->session->userdata('id_periode');
//        $umur = $this->input->post('umur');
//        $tanggal = $this->input->post('tanggal');
//        $ip = $this->input->post('ip');
//        $fcr = $this->input->post('fcr');
        $jml_mati_sebelumnya = $this->input->post('jm_mati_sebelumnya');
        $jml_mati = $this->input->post('jumlahmati');
        $mortalitas = $this->input->post('mortalitas');
        $berat_rata = $this->input->post('beratrata');
        $berat_sebelumnya = $this->input->post('berat_rata_sebelumnya');

        $mortalitasUpdate = $this->mortalitas($mortalitas, $jml_mati, $jml_mati_sebelumnya);
        echo "".$mortalitasUpdate;
    }

    public function mortalitas($mortalitas, $jml_mati, $jml_mati_sebelumnya){
        $hasilMortalitas = 0;
        $volume = $this->session->userdata('volume');

        if ($jml_mati > $jml_mati_sebelumnya){
            $jml_mati_update = $jml_mati - $jml_mati_sebelumnya;
            $mortalitas1 = ($jml_mati_update/$volume)*100;
            $hasilMortalitas = $mortalitas + $mortalitas1;
        } else if ($jml_mati < $jml_mati_sebelumnya){
            $jml_mati_update = $jml_mati_sebelumnya - $jml_mati;
            $mortalitas1 = ($jml_mati_update/$volume)*100;
            $hasilMortalitas = $mortalitas - $mortalitas1;
        } else {
            $hasilMortalitas = $mortalitas;
        }



        return $hasilMortalitas;
    }

}