<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myfpdf {

    public function __construct() {
        require_once APPPATH . "/third_party/fpdf17/fpdf.php";
    }

}
