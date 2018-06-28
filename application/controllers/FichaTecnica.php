<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FichaTecnica extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('fichatecnica_model')
                ->model('estilos_model')->model('combinaciones_model')->model('piezas_model')
                ->model('materiales_model')->model('piezas_model')->model('generales_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vFichaTecnica')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->fichatecnica_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesRequeridos() {
        try {
            print json_encode($this->fichatecnica_model->getMaterialesRequeridos($this->input->get('Familia')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFamilias() {
        try {
            print json_encode($this->generales_model->getCatalogosByFielID('FAMILIAS'));
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
            print json_encode($this->fichatecnica_model->onComprobarExisteEstiloCombinacion($this->input->get('Estilo'), $this->input->get('Combinacion')));
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
            print json_encode($this->estilos_model->getEstiloByID($this->input->get('Estilo')));
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
            print json_encode($this->fichatecnica_model->getFichaTecnicaDetalleByID($this->input->get('Estilo'), $this->input->get('Combinacion')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaByEstiloByCombinacion() {
        try {
            print json_encode($this->fichatecnica_model->getFichaTecnicaByEstiloByCombinacion($this->input->get('Estilo'), $this->input->get('Combinacion')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
                'Estilo' => ($x->post('Estilo') !== NULL) ? $x->post('Estilo') : NULL,
                'Combinacion' => ($x->post('Combinacion') !== NULL) ? $x->post('Combinacion') : NULL,
                'Pieza' => ($x->post('Pieza') !== NULL) ? $x->post('Pieza') : NULL,
                'Material' => ($x->post('Material') !== NULL) ? $x->post('Material') : NULL,
                'Precio' => ($x->post('Precio') !== NULL) ? $x->post('Precio') : 0,
                'Consumo' => ($x->post('Consumo') !== NULL) ? $x->post('Consumo') : 0,
                'TipoPiel' => ($x->post('TipoPiel') !== NULL) ? $x->post('TipoPiel') : NULL,
                'PzXPar' => ($x->post('PzXPar') !== NULL) ? $x->post('PzXPar') : NULL,
                'Estatus' => 'ACTIVO'
            );
            $ID = $this->fichatecnica_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {
            unset($_POST['ID']);
            $this->fichatecnica_model->onModificar($this->input->post('ID'), $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->fichatecnica_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle() {
        try {
            $this->fichatecnica_model->onEliminarRenglonDetalle($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarMaterialID() {
        try {
            $this->db->where('ID', $this->input->post('ID'))->delete('sz_FichaTecnica');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEditarFichaTecnicaDetalle() {
        try {
            $x = $this->input;
            $d = $this->db;
            switch ($x->post('CELDA')) {
                case 'CONSUMO':
                    $d->set('Consumo', $x->post('VALOR'));
                    break;
                case 'PRECIO':
                    $d->set('Precio', $x->post('VALOR'));
                    break;
                case 'PZAXPAR':
                    $d->set('PzXPar', $x->post('VALOR'));
                    break;
            }
            $d->where('ID', $x->post('ID'))->update('sz_FichaTecnica');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
