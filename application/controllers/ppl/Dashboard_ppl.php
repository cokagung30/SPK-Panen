<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/13/2019
 * Time: 8:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ppl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKandang', 'kandang');
    }

    public function index()
    {
        $status = $this->session->userdata('status_login_ppl');
        if ($status == "Berhasil Login PPL") {
            $data['halaman'] = "dashboard_ppl";
            $data['jumlah_kandang'] = $this->kandang->getCountKandangppl($this->session->userdata('id_ppl'))->num_rows();
            $this->load->view('ppl/body/dashboard_ppl', $data);
        } else {
            redirect(base_url()."ppl/Login/index");
        }

    }
}