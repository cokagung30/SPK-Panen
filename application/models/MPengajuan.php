<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/18/2019
 * Time: 10:56 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class MPengajuan extends CI_Model{

    public function deletePengajuan($id_pengajuan) {
        $this->db->delete('pengajuan', array('id_pengajuan' => $id_pengajuan));

    }
    public function tampilPengajuan($id_user){
        $this->db->select('periode.*, data_ayam.*, pengajuan.*, kelayakan.*');
        $this->db->from('data_ayam');
        $this->db->join('pengajuan', 'pengajuan.id_data_ayam = data_ayam.id_data_ayam');
        $this->db->join('periode', 'periode.id_periode = data_ayam.id_periode');
        $this->db->join('kelayakan', 'kelayakan.id_kelayakan = data_ayam.id_kelayakan');
        $this->db->where('pengajuan.id_pemilik_kandang', $id_user);
        return $this->db->get();
    }

    public function insertPengajuan($data){
        $this->db->insert('pengajuan', $data);
    }
}