<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelayakan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKelayakan', 'kelayakan');
    }

    public function index()
    {
        if ($this->session->userdata('status_login_ppl') == 'Berhasil Login PPL') {
            $data['halaman'] = "kelayakan";
            $data['sql1'] = $this->kelayakan->tampilKelayakan($this->session->userdata('id_ppl'));
            $this->load->view('ppl/body/kelayakan', $data);
        } else {
            redirect(base_url() . 'ppl/Kelayakan/index');
        }
    }

    public function updateKelayakan()
    {
        $id_kelayakan = $this->input->post('id_kelayakan');

        $data = array(
            'batas_atas' => $this->input->post('batas_atas'),
            'batas_bawah' => $this->input->post('batas_bawah'),
            'status' => $this->input->post('status'),
        );

        $update = $this->kelayakan->updateKelayakan($id_kelayakan, $data);
        if ($update > 0) {
            $this->session->set_flashdata('pesan', 'updated');
            redirect(base_url() . "ppl/Kelayakan/index");
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect(base_url() . "ppl/Kelayakan/index");
        }
    }
}