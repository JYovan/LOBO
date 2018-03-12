<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialesXCombinacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('materialesxcombinacion_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vMaterialesXCombinacion');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->materialesxcombinacion_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesRequeridos() {
        try {
            print json_encode($this->materialesxcombinacion_model->getMaterialesRequeridos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinaciones() {
        try {
            print json_encode($this->materialesxcombinacion_model->getCombinaciones());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->materialesxcombinacion_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesXCombinacionByID() {
        try {
            print json_encode($this->materialesxcombinacion_model->getMaterialesXCombinacionByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getMaterialesXCombinacionDetalleByID() {
        try {
            print json_encode($this->materialesxcombinacion_model->getMaterialesXCombinacionDetalleByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Combinacion' => ($this->input->post('Combinacion') !== NULL) ? $this->input->post('Combinacion') : NULL,
                'Estatus' => 'ACTIVO',
                'Registro' => Date('d/m/Y h:i:s a')
            );

            $ID = $this->materialesxcombinacion_model->onAgregar($data);

            $viviendas = json_decode($this->input->post("Materiales"));
            foreach ($viviendas as $key => $v) {
                $data = array(
                    'MaterialXCombinacion' => $ID,
                    'Material' => $v->Material,
                    'Consumo' => $v->Consumo,
                    'Tipo' => $v->Tipo,
                    'Estatus' => 'ACTIVO',
                    'Registro' => Date('d/m/Y h:i:s a'),
                    'Precio' => $v->Precio
                );
                $this->materialesxcombinacion_model->onAgregarDetalle($data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'Modulo' => ($this->input->post('Modulo') !== NULL) ? $this->input->post('Modulo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->materialesxcombinacion_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->materialesxcombinacion_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
