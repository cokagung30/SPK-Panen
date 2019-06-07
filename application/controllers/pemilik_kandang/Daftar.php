<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PemilikKandang', 'pemilik');
    }

    public function index()
    {
        $status['halaman'] = "daftar";
        $this->load->view('pemilik_kandang/body/daftar', $status);
    }

    public function tambahPemilik()
    {
        $this->form_validation->set_rules('namaUser','Nama User','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('emailAdress','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('repatPassword', 'Repaeat Password', 'required|matches[password]');

        if ($this->form_validation->run()){
            $data = array(
                'nama_pemilik_kandang' => $this->input->post('namaUser'),
                'no_telp' => $this->input->post('noTelp'),
                'email' => $this->input->post('emailAdress'),
                'alamat' =>$this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $insert = $this->pemilik->tambahPemilik($data);
            if ($insert > 0){
                redirect(base_url()."pemilik_kandang/Login/index");
            } else{
                $status['messeage'] = "Gagal";
                $this->load->view('pemilik_kandang/body/daftar', $status);
            }
        } else{
            $this->index();
        }

    }

}