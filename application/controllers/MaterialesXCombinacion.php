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
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Combinacion' => ($this->input->post('Combinacion') !== NULL) ? $this->input->post('Combinacion') : NULL
            );
            $this->materialesxcombinacion_model->onModificar($this->input->post('ID'), $data);
            /* ELIMINAR CUALQUIER DETALLE */
            $this->materialesxcombinacion_model->onEliminarDetalle($this->input->post('ID'));

            /* AGREGAR,ELIMINAR O MODIFICAR DETALLE */
            $materiales = json_decode($this->input->post("Materiales"));
            foreach ($materiales as $key => $v) {
                /* COMPROBAR SI EL MATERIAL LEIDO EXISTE */
                $dtm = $this->materialesxcombinacion_model->getExisteMaterial($v->Material, $this->input->post('ID'));
                /* SI EXISTE, MODIFICARLO */
                if ($dtm[0]->EXISTE > 0) {
                    $data = array(
                        'Material' => $v->Material,
                        'Consumo' => $v->Consumo,
                        'Estatus' => 'ACTIVO'
                    );
                    $this->materialesxcombinacion_model->onModificarDetalle($v->Material, $data, $this->input->post('ID'));
                } else {
                    $data = array(
                        'MaterialXCombinacion' => $this->input->post('ID'),
                        'Material' => $v->Material,
                        'Consumo' => $v->Consumo,
                        'Estatus' => 'ACTIVO',
                        'Registro' => Date('d/m/Y h:i:s a'),
                        'Precio' => $v->Precio
                    );
                    $this->materialesxcombinacion_model->onAgregarDetalle($data);
                }
            }
            /* ELIMINAR INACTIVOS */
            foreach ($materiales as $key => $v) {
                $this->materialesxcombinacion_model->onEliminarDetalleInactivo($this->input->post('ID'), $v->Material);
            }
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
