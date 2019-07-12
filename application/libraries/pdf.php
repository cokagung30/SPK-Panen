<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 7/10/2019
 * Time: 8:22 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class pdf extends Dompdf{

    public function __construct()
    {
        parent::__construct();
    }

    public function ci(){
        return get_instance();
    }

    public function generate($view, $data=array(), $filename){
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->loadHtml($html);
        $this->setPaper('A4', 'portrait');
        $this->render();
        $this->stream($filename.".pdf", array("Attachment" => FALSE));
    }

}