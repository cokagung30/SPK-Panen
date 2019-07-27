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
    public function tampilPengajuan($id_ppl){
        $this->db->select('periode.*, data_ayam.*, pengajuan.*, kelayakan.*');
        $this->db->from('data_ayam');
        $this->db->join('pengajuan', 'pengajuan.id_data_ayam = data_ayam.id_data_ayam');
        $this->db->join('periode', 'periode.id_periode = data_ayam.id_periode');
        $this->db->join('kelayakan', 'kelayakan.id_kelayakan = pengajuan.verifikasi');
        $this->db->where('pengajuan.id_pemilik_kandang', $id_ppl);
        $this->db->where('pengajuan.status_pengajuan', '0');
        return $this->db->get();
    }
    public function tampilPengajuan1($id_ppl){
        $this->db->select('periode.*, data_ayam.*, pengajuan.*, kelayakan.*, pemilik_kandang.*');
        $this->db->from('data_ayam');
        $this->db->join('pengajuan', 'pengajuan.id_data_ayam = data_ayam.id_data_ayam');
        $this->db->join('periode', 'periode.id_periode = data_ayam.id_periode');
        $this->db->join('kelayakan', 'kelayakan.id_kelayakan = pengajuan.verifikasi');
        $this->db->join('pemilik_kandang', 'pemilik_kandang.id_pemilik_kandang = pengajuan.id_pemilik_kandang');
        $this->db->where('pemilik_kandang.id_ppl', $id_ppl);
        $this->db->where('pengajuan.status_pengajuan', '0');
        return $this->db->get();
    }
    public function insertPengajuan($data){
        $this->db->insert('pengajuan', $data);
    }

    public function updatePengajuan($id_pengajuan, $data){
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan', $data);
        return $this->db->affected_rows();
    }
    public function notif(){
        $this->db->where('notif','0');
        return $this->db->count_all_results('pengajuan');
    }
    public function refresh(){
        $this->db->where('notif','0');
        $this->db->set('notif','1');
        return $this->db->update('pengajuan');
    }
    public function tampilPengajuan2($id_ppl){
        $this->db->select('periode.*, data_ayam.*, pengajuan.*, kelayakan.*, pemilik_kandang.*');
        $this->db->from('data_ayam');
        $this->db->join('pengajuan', 'pengajuan.id_data_ayam = data_ayam.id_data_ayam');
        $this->db->join('periode', 'periode.id_periode = data_ayam.id_periode');
        $this->db->join('kelayakan', 'kelayakan.id_kelayakan = pengajuan.verifikasi');
        $this->db->join('pemilik_kandang', 'pemilik_kandang.id_pemilik_kandang = pengajuan.id_pemilik_kandang');
        $this->db->where('pemilik_kandang.id_ppl', $id_ppl);
        $this->db->where('pengajuan.status_pengajuan', '2');
        $this->db->or_where('pengajuan.status_pengajuan', '1');
        return $this->db->get();
}
    public function tampilPengajuan3($id_pemilik_kandang){
        $this->db->select('periode.*, data_ayam.*, pengajuan.*, kelayakan.*, pemilik_kandang.*');
        $this->db->from('data_ayam');
        $this->db->join('pengajuan', 'pengajuan.id_data_ayam = data_ayam.id_data_ayam');
        $this->db->join('periode', 'periode.id_periode = data_ayam.id_periode');
        $this->db->join('kelayakan', 'kelayakan.id_kelayakan = pengajuan.verifikasi');
        $this->db->join('pemilik_kandang', 'pemilik_kandang.id_pemilik_kandang = pengajuan.id_pemilik_kandang');
        $this->db->where('pemilik_kandang.id_pemilik_kandang', $id_pemilik_kandang);
        $this->db->where('pengajuan.status_pengajuan', '2');
        $this->db->or_where('pengajuan.status_pengajuan', '1');
        return $this->db->get();
    }

    public function fetchPengajuan($id_pemilik_kandang, $id_pengajuan){
        $this->db->select('periode.*, data_ayam.*, pengajuan.*, kelayakan.*, pemilik_kandang.*, kandang.*, ppl.*');
        $this->db->from('data_ayam');
        $this->db->join('pengajuan', 'pengajuan.id_data_ayam = data_ayam.id_data_ayam');
        $this->db->join('periode', 'periode.id_periode = data_ayam.id_periode');
        $this->db->join('kelayakan', 'kelayakan.id_kelayakan = pengajuan.verifikasi');
        $this->db->join('kandang', 'periode.id_kandang = kandang.id_kandang');
        $this->db->join('ppl', 'ppl.id_ppl = kandang.id_ppl');
        $this->db->join('pemilik_kandang', 'pemilik_kandang.id_pemilik_kandang = pengajuan.id_pemilik_kandang');
        $this->db->where('pemilik_kandang.id_pemilik_kandang', $id_pemilik_kandang);
        $this->db->where('pengajuan.id_pengajuan', $id_pengajuan);
        $this->db->where('pengajuan.status_pengajuan', '2');
        $this->db->or_where('pengajuan.status_pengajuan', '1');
        return $this->db->get();
    }
    public function notif_pemilik(){
        $this->db->where('notif_pemilik', '1');
        return $this->db->count_all_results('pengajuan');
    }
    public function refresh_pemilik(){
        $this->db->where('notif_pemilik','1');
        $this->db->set('notif_pemilik','2');
        return $this->db->update('pengajuan');
    }

    public function getMaxPeriode($id_pemilik_kandang){
        $this->db->select_max('id_pengajuan');
        $this->db->select('data_ayam.id_periode');
        $this->db->join('data_ayam', 'data_ayam.id_data_ayam = pengajuan.id_data_ayam');
        $this->db->from('pengajuan');
        $this->db->where('id_pemilik_kandang',$id_pemilik_kandang);
        $this->db->group_by('data_ayam.id_periode');

        return $this->db->get();
    }
}