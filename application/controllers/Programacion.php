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

    public function onAgregarControl() {
        try {

            $controles = json_decode($this->input->post('Controles'));
            foreach ($controles as $k => $v) {
                $data = array(
                    'Control' => $v->Control
                    , 'FechaProg' => $v->FechaProg
                    , 'Estilo' => $v->Estilo
                    , 'Color' => $v->Color
                    , 'Serie' => $v->Serie
                    , 'Cliente' => $v->Cliente
                    , 'Pares' => $v->Pares
                    , 'Pedido' => $v->Pedido
                    , 'PedidoDetalle' => $v->PedidoDetalle
                    , 'Estatus' => 'ACTIVO'
                    , 'EstatusDepto' => 1 //'PROGRAMADO'
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
