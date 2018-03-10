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
            extract($this->input->post());


            $data = $this->generales_model->getRecords($fieldId);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCatalogoByID() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogoByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'FieldId' => ($this->input->post('FieldId') !== NULL) ? $this->input->post('FieldId') : NULL,
                'IValue' => ($this->input->post('IValue') !== NULL) ? $this->input->post('IValue') : NULL,
                'SValue' => ($this->input->post('SValue') !== NULL) ? $this->input->post('SValue') : NULL,
                'Special' => ($this->input->post('Special') !== NULL) ? $this->input->post('Special') : NULL,
                'Valor_Num' => ($this->input->post('Valor_Num') !== NULL) ? $this->input->post('Valor_Num') : NULL,
                'Valor_Text' => ($this->input->post('Valor_Text') !== NULL) ? $this->input->post('Valor_Text') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->generales_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'IValue' => ($this->input->post('IValue') !== NULL) ? $this->input->post('IValue') : NULL,
                'SValue' => ($this->input->post('SValue') !== NULL) ? $this->input->post('SValue') : NULL,
                'Special' => ($this->input->post('Special') !== NULL) ? $this->input->post('Special') : NULL,
                'Valor_Num' => ($this->input->post('Valor_Num') !== NULL) ? $this->input->post('Valor_Num') : NULL,
                'Valor_Text' => ($this->input->post('Valor_Text') !== NULL) ? $this->input->post('Valor_Text') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->generales_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->generales_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
