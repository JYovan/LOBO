<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rangos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('rangos_model');
        $this->load->model('estilos_model');
        $this->load->model('materiales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vRangos');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());
            $data = $this->rangos_model->getRecords();
            print json_encode($data);
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
            print json_encode($this->materiales_model->getMaterialesByFamilia($this->input->get('Familia')));
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
            switch ($row->post('CELDA')) {
                case 'SUELA':
                    $this->db->set('Suela', strtoupper($row->post('VALOR')))->where('ID', $row->post('ID'))->update('sz_RangosCompras');
                    break;
                case 'PLANTA':
                    $this->db->set('Planta', strtoupper($row->post('VALOR')))->where('ID', $row->post('ID'))->update('sz_RangosCompras');
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
            extract($this->input->post());
            $this->rangos_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
