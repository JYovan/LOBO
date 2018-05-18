<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PiezasYMateriales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('piezasymateriales_model');
        $this->load->model('piezas_model');
        $this->load->model('estilos_model');
        $this->load->model('combinaciones_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vPiezasYMateriales');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->piezasymateriales_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarEstiloXCombinacion() {
        try {
            print json_encode($this->piezasymateriales_model->onComprobarEstiloXCombinacion($this->input->get('ID'), $this->input->get('E'), $this->input->get('C')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesRequeridos() {
        try {
            print json_encode($this->piezasymateriales_model->getMaterialesRequeridos($this->input->post('Familia')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            print json_encode($this->combinaciones_model->getCombinacionesXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFamilias() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('FAMILIAS');
            print json_encode($data);
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

    public function getPiezas() {
        try {
            print json_encode($this->piezas_model->getPiezas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasYMaterialesByID() {
        try {
            print json_encode($this->piezasymateriales_model->getPiezasYMaterialesByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidadPrecioTipoXMaterialID() {
        try {
            print json_encode($this->piezasymateriales_model->getUnidadPrecioTipoXMaterialID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasYMaterialesDetalleByID() {
        try {
            print json_encode($this->piezasymateriales_model->getPiezasYMaterialesDetalleByID($this->input->get('ID')));
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

            $ID = $this->piezasymateriales_model->onAgregar($data);

            $materiales = json_decode($this->input->post("Materiales"));
            foreach ($materiales as $key => $v) {
                $data = array(
                    'PiezasYMateriales' => $ID,
                    'Pieza' => $v->Pieza,
                    'Material' => $v->Material,
                    'Consumo' => $v->Consumo,
                    'PzXPar' => $v->PzXPar,
                    'Estatus' => 'ACTIVO',
                    'Precio' => $v->Precio
                );
                $this->piezasymateriales_model->onAgregarDetalle($data);
            }
            print $ID;
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
            $this->piezasymateriales_model->onModificar($this->input->post('ID'), $data);
            /* ELIMINAR CUALQUIER DETALLE */
            $this->piezasymateriales_model->onEliminarDetalle($this->input->post('ID'));

            /* AGREGAR,ELIMINAR O MODIFICAR DETALLE */
            $materiales = json_decode($this->input->post("Materiales"));
            foreach ($materiales as $key => $v) {
                /* COMPROBAR SI EL MATERIAL-PIEZA LEIDO EXISTE */
                $dtm = $this->piezasymateriales_model->getExisteMaterial($v->Material, $v->Pieza, $this->input->post('ID'));
                /* SI EXISTE, MODIFICARLO */
                if ($dtm[0]->EXISTE > 0) {
                    $data = array(
                        'Pieza' => $v->Pieza,
                        'Material' => $v->Material,
                        'Precio' => $v->Precio,
                        'Consumo' => $v->Consumo,
                        'PzXPar' => $v->PzXPar,
                        'Estatus' => 'ACTIVO'
                    );
                    $this->piezasymateriales_model->onModificarDetalle($v->Material, $v->Pieza, $data, $this->input->post('ID'));
                } else {
                    $data = array(
                        'PiezasYMateriales' => $this->input->post('ID'),
                        'Pieza' => $v->Pieza,
                        'Material' => $v->Material,
                        'Consumo' => $v->Consumo,
                        'PzXPar' => $v->PzXPar,
                        'Estatus' => 'ACTIVO',
                        'Precio' => $v->Precio
                    );
                    $this->piezasymateriales_model->onAgregarDetalle($data);
                }
            }
            /* ELIMINAR INACTIVOS */
            foreach ($materiales as $key => $v) {
                $this->piezasymateriales_model->onEliminarDetalleInactivo($this->input->post('ID'), $v->Material);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->piezasymateriales_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
