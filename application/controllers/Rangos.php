<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rangos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('rangos_model')->model('estilos_model')->model('materiales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vRangos')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->rangos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecordByID() {
        try {
            print json_encode($this->rangos_model->getRecordByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecordsByID() {
        try {
            print json_encode($this->rangos_model->getRecordsByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEncabezadoSerieXEstilo() {
        try {
            print json_encode($this->estilos_model->getEncabezadoSerieXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->estilos_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesByFamilia() {
        try {
            print json_encode($this->rangos_model->getMaterialesByFamilia($this->input->get('Familia')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstilo() {
        try {
            print json_encode($this->rangos_model->onComprobarExisteEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Talla' => ($this->input->post('Talla') !== NULL) ? $this->input->post('Talla') : NULL,
                'Fecha' => Date('d/m/Y'),
                'Estatus' => 'ACTIVO'
            );
            $ID = $this->rangos_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $row = $this->input;
            switch ($row->post('TIPO')) {
                case 'SUELA':
                    $this->db->set('Suela', strtoupper($row->post('VALOR')))->where('ID', $row->post('ID'))->update('sz_RangosCompras');
                    break;
                case 'PLANTA':
                    $this->db->set('Plantilla', strtoupper($row->post('VALOR')))->where('ID', $row->post('ID'))->update('sz_RangosCompras');
                    break;
                case 'ENTRESUELA':
                    $this->db->set('Entresuela', strtoupper($row->post('VALOR')))->where('ID', $row->post('ID'))->update('sz_RangosCompras');
                    break;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->rangos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}