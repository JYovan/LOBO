<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
}