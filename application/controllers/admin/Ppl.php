<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPpl', 'ppl');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login super') {
            $data['halaman'] = "Ppl";
            $data['sql1'] = $this->ppl->tampilPpl($this->session->userdata('id_user'));
            $data['ppl']=$this->ppl->tampilPpl();
            $this->load->view('admin/body/ppl', $data);
        } else {
            redirect(base_url() . 'admin/Login/index');
        }
    }

    public function tambahPpl()
    {
        $data = array(
            'id_ppl' => $this->session->userdata('id_user'),
            'nama_ppl' => $this->input->post('nama_ppl'),
            'no_telp'=>$this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
        );

        $process = $this->ppl->tambahPpl($data);
        if ($process > 0) {
            $this->session->set_flashdata('pesan', 'berhasil');
            redirect(base_url() . "admin/Ppl/index");
        }
    }
}