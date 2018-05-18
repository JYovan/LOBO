<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('usuario_model');
        $this->load->model('generales_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vGenerales');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->generales_model->getRecords($this->input->post('fieldId')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCatalogoByID() {
        try {
            print json_encode($this->generales_model->getCatalogoByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
                'FieldId' => ($x->post('FieldId') !== NULL) ? $x->post('FieldId') : NULL,
                'IValue' => ($x->post('IValue') !== NULL) ? $x->post('IValue') : NULL,
                'SValue' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                'Special' => ($x->post('Special') !== NULL) ? $x->post('Special') : NULL,
                'Valor_Num' => ($x->post('Valor_Num') !== NULL) ? $x->post('Valor_Num') : NULL,
                'Valor_Text' => ($x->post('Valor_Text') !== NULL) ? $x->post('Valor_Text') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );
            $ID = $this->generales_model->onAgregar($data);

            if ($x->post('FieldId') === 'UNIDADES') {
                /* AGREGAR EN UNIDADES MAGNUS */
                $IDU = $this->generales_model->getUltimaUnidad()[0]->MU;
                $data = array(
                    'IdUnidad' => $IDU,
                    'UnidadEntrada' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                    'UnidadSalida' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                    'Factor' => $x->post('Factor') > 0 ? $x->post('Factor') : 0
                );
                $this->generales_model->onAgregarUnidadMagnus($data);

                /* AGREGAR EN UNIDADES FACTOR MAGNUS */
                $data = array(
                    'Descripcion' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                    'IdUnidad' => $IDU,
                    'Tipo' => 'N',
                    'Factor' => $x->post('Factor') > 0 ? $x->post('Factor') : 0,
                    'OptimisticLockField' => 0,
                    'GCRecord' => NULL
                );
                $this->generales_model->onAgregarUnidadFactorMagnus($data);

                /* MODIFICAR EN SISTEMA LOBO */
                $data = array(
                    'IdMagnus' => $IDU
                );
                $this->generales_model->onModificar($ID, $data);
            }
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $DATA = array(
                'IValue' => ($x->post('IValue') !== NULL) ? $x->post('IValue') : NULL,
                'SValue' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                'Special' => ($x->post('Special') !== NULL) ? $x->post('Special') : NULL,
                'Valor_Num' => ($x->post('Valor_Num') !== NULL) ? $x->post('Valor_Num') : NULL,
                'Valor_Text' => ($x->post('Valor_Text') !== NULL) ? $x->post('Valor_Text') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );
            $this->generales_model->onModificar($this->input->post('ID'), $DATA);

            /**/
            if ($x->post('FieldId') === 'UNIDADES') {
                /* MODIFICAR EN UNIDADES MAGNUS */
                $data = array(
                    'UnidadEntrada' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                    'UnidadSalida' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                    'Factor' => $x->post('Factor') > 0 ? $x->post('Factor') : 0
                );
                $this->generales_model->onModificarUnidadMagnus($this->input->post('IdMagnus'), $data);

                /* MODIFICAR EN UNIDADES FACTOR MAGNUS */
                $data = array(
                    'Descripcion' => ($x->post('SValue') !== NULL) ? $x->post('SValue') : NULL,
                    'Factor' => $x->post('Factor') > 0 ? $x->post('Factor') : 0
                );
                $this->generales_model->onModificarUnidadFactorMagnus($this->input->post('IdMagnus'), $data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->generales_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
