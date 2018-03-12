<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fracciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('fracciones_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vFracciones');
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


            $data = $this->fracciones_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getDepartamentos() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('DEPARTAMENTOS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionByID() {
        try {
            extract($this->input->post());
            $data = $this->fracciones_model->getFraccionByID($ID);
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
                'DepartamentoCat' => ($this->input->post('DepartamentoCat') !== NULL) ? $this->input->post('DepartamentoCat') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->fracciones_model->onAgregar($data);
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
                'DepartamentoCat' => ($this->input->post('DepartamentoCat') !== NULL) ? $this->input->post('DepartamentoCat') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->fracciones_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->fracciones_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
