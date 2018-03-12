<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Combinaciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('combinaciones_model');
        $this->load->model('estilos_model');
        $this->load->model('lineas_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vCombinaciones');
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


            $data = $this->combinaciones_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionByID() {
        try {
            extract($this->input->post());
            $data = $this->combinaciones_model->getCombinacionByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getLineas() {
        try {
            extract($this->input->post());
            $data = $this->lineas_model->getLineas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getEstilos() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getEstilos();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Linea' => ($this->input->post('Linea') !== NULL) ? $this->input->post('Linea') : NULL,
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->combinaciones_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Linea' => ($this->input->post('Linea') !== NULL) ? $this->input->post('Linea') : NULL,
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->combinaciones_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->combinaciones_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
