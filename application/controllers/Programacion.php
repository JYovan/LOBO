<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('programacion_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vProgramacion')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }
 
    public function getRecords() {
        try {
            print json_encode($this->programacion_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}