<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('departamentos_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vDepartamentos');
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


            $data = $this->departamentos_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDep_Prod() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('DEP-PROD');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentoByID() {
        try {
            extract($this->input->post());
            $data = $this->departamentos_model->getDepartamentoByID($ID);
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
                'Dep_Prod' => ($this->input->post('Dep_Prod') !== NULL) ? $this->input->post('Dep_Prod') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $ID = $this->departamentos_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $data = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Dep_Prod' => ($this->input->post('Dep_Prod') !== NULL) ? $this->input->post('Dep_Prod') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->departamentos_model->onModificar($ID, $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->departamentos_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
