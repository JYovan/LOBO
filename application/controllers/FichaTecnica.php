<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FichaTecnica extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('fichaTecnica_model');
        $this->load->model('estilos_model');
        $this->load->model('combinaciones_model');
        $this->load->model('piezas_model');
        $this->load->model('materiales_model');
        $this->load->model('piezas_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vFichaTecnica');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->fichaTecnica_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesRequeridos() {
        try {
            print json_encode($this->fichaTecnica_model->getMaterialesRequeridos($this->input->post('Familia')));
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

    public function getPiezas() {
        try {
            print json_encode($this->piezas_model->getPiezas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstiloCombinacion() {
        try {
            print json_encode($this->fichaTecnica_model->onComprobarExisteEstiloCombinacion($this->input->get('Estilo'), $this->input->get('Combinacion')));
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

    public function getEstiloByID() {
        try {
            extract($this->input->post());
            print json_encode($this->estilos_model->getEstiloByID($Estilo));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            print json_encode($this->combinaciones_model->getCombinacionesXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaDetalleByID() {
        try {
            print json_encode($this->fichaTecnica_model->getFichaTecnicaDetalleByID($this->input->get('Estilo'), $this->input->get('Combinacion')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaByEstiloByCombinacion() {
        try {
            extract($this->input->post());
            $data = $this->fichaTecnica_model->getFichaTecnicaByEstiloByCombinacion($this->input->post('Estilo'), $this->input->post('Combinacion'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Combinacion' => ($this->input->post('Combinacion') !== NULL) ? $this->input->post('Combinacion') : NULL,
                'Pieza' => ($this->input->post('Pieza') !== NULL) ? $this->input->post('Pieza') : NULL,
                'Material' => ($this->input->post('Material') !== NULL) ? $this->input->post('Material') : NULL,
                'Precio' => ($this->input->post('Precio') !== NULL) ? $this->input->post('Precio') : 0,
                'Consumo' => ($this->input->post('Consumo') !== NULL) ? $this->input->post('Consumo') : 0,
                'TipoPiel' => ($this->input->post('TipoPiel') !== NULL) ? $this->input->post('TipoPiel') : NULL,
                'PzXPar' => ($this->input->post('PzXPar') !== NULL) ? $this->input->post('PzXPar') : NULL,
                'Estatus' => 'ACTIVO'
            );
            $ID = $this->fichaTecnica_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {
            extract($this->input->post());
            unset($_POST['ID']);
            $this->fichaTecnica_model->onModificar($ID, $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->fichaTecnica_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle() {
        try {
            extract($this->input->post());
            $this->fichaTecnica_model->onEliminarRenglonDetalle($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
