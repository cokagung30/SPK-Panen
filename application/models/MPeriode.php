<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/19/2019
 * Time: 2:10 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MPeriode extends CI_Model{

    public function getLastNomorPeriode($id_kandang){
        $this->db->select_max('nomor_periode');
        $this->db->where('id_kandang', $id_kandang);
        return $this->db->get('periode');
    }

    public function getAllPeriode($id_user){
        $this->db->select('periode.*, kandang.*');
        $this->db->from('periode');
        $this->db->join('kandang', 'kandang.id_kandang = periode.id_kandang');
        $this->db->where('kandang.id_pemilik_kandang', $id_user);
        $this->db->order_by('periode.id_kandang');
        return $this->db->get();
    }

    public function tambahKandang($data){
        $this->db->insert('periode', $data);
        return $this->db->affected_rows();
    }

    public function deletePeriode($id_periode) {
        $this->db->delete('periode', array('id_periode' => $id_periode));
    }

    public function updatePeriode($id_periode, $data){
        $this->db->where('id_periode', $id_periode);
        $this->db->update('periode', $data);
        return $this->db->affected_rows();
    }

    public function updateNomorPeriode($nomor_periode, $id_kandang){
        $this->db->query("UPDATE periode SET nomor_periode = (nomor_periode-1) WHERE nomor_periode > '$nomor_periode' AND id_kandang = '$id_kandang'");
    }

    public function getAllPeriodeByKandang($id_kandang){
        $this->db->select('periode.*, kandang.*');
        $this->db->from('periode');
        $this->db->join('kandang', 'kandang.id_kandang = periode.id_kandang');
        $this->db->where('periode.id_kandang', $id_kandang);
        $this->db->order_by('periode.id_kandang');
        return $this->db->get();
    }

    public function getPeriodeByNomor($nomor){
        $this->db->select('periode.*, kandang.*');
        $this->db->from('periode');
        $this->db->join('kandang', 'kandang.id_kandang = periode.id_kandang');
        $this->db->where('periode.nomor_periode', $nomor);
        return $this->db->get();
    }

    public function getCountPeriode($id_pemilik){
        $this->db->select('periode.id_periode');
        $this->db->from('periode');
        $this->db->join('kandang', 'kandang.id_kandang = periode.id_kandang');
        $this->db->where('kandang.id_pemilik_kandang', $id_pemilik);
        return $this->db->count_all_results();
    }

    public function getCountPeriodePegawai($id_pegawai){
        $this->db->select('periode.id_periode');
        $this->db->from('kandang');
        $this->db->join('periode', 'periode.id_kandang = kandang.id_kandang');
        $this->db->join('pegawai', 'pegawai.id_kandang = kandang.id_kandang');
        $this->db->where('pegawai.id_pegawai', $id_pegawai);
        return $this->db->count_all_results();
    }

}