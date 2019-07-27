<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 7/10/2019
 * Time: 8:22 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

<<<<<<< HEAD
class pdf extends Dompdf
{
=======
class pdf extends Dompdf{
>>>>>>> dcc3e7e18a11072b4063a27e0b9f321b3f8cf50e

    public function __construct()
    {
        parent::__construct();
    }

<<<<<<< HEAD
    public function ci()
    {
=======
    public function ci(){
>>>>>>> dcc3e7e18a11072b4063a27e0b9f321b3f8cf50e
        return get_instance();
    }

    public function generate($view, $data=array(), $filename){
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->loadHtml($html);
        $this->setPaper('A4', 'portrait');
        $this->render();
        $this->stream($filename.".pdf", array("Attachment" => FALSE));
    }

<<<<<<< HEAD
}

=======
}
>>>>>>> dcc3e7e18a11072b4063a27e0b9f321b3f8cf50e
