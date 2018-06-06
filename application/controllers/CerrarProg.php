<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CerrarProg extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('cerrarprog_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vCerrarProg')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->cerrarprog_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onGenerarControles() {
        try {
            $controles = json_decode($this->input->post('SubControles'));
            foreach ($controles as $k => $v) {
                $data = array(
                    'FechaProg' => Date('d/m/Y h:i:s a'),
                    'Estilo' => $v->Estilo,
                    'Color' => $v->Color,
                    'Serie' => $v->Serie,
                    'Cliente' => $v->Cliente,
                    'Pares' => $v->Pares,
                    'Pedido' => $v->Pedido,
                    'PedidoDetalle' => $v->PedidoDetalle,
                    'Estatus' => 'A',
                    'EstatusDepto' => 'PROGRAMADO',
                    'ctAno' => substr(Date('Y'), 2),
                    'ctMaq' => $v->Maquila,
                    'ctSem' => str_pad($v->Semana),
                    'ctCons' => $this->cerrarprog_model->getMaximoConsecutivo()[0]->MAX
                );
                $this->cerrarprog_model->onAgregarControl($data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
