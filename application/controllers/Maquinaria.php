<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinaria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('maquinaria_model');
        $this->load->model('departamentos_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vMaquinaria');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getDepartamentos() {
        try {
            print json_encode($this->departamentos_model->getDepartamentos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());


            $data = $this->maquinaria_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquinariaByID() {
        try {
            extract($this->input->post());
            $data = $this->maquinaria_model->getMaquinariaByID($ID);
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
                'Marca' => ($this->input->post('Marca') !== NULL) ? $this->input->post('Marca') : NULL,
                'Modelo' => ($this->input->post('Modelo') !== NULL) ? $this->input->post('Modelo') : NULL,
                'NoSerie' => ($this->input->post('NoSerie') !== NULL) ? $this->input->post('NoSerie') : NULL,
                'Departamento' => ($this->input->post('Departamento') !== NULL) ? $this->input->post('Departamento') : NULL,
                'FechaAlta' => Date('d/m/Y h:i:s a'),
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $ID = $this->maquinaria_model->onAgregar($data);
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
                'Marca' => ($this->input->post('Marca') !== NULL) ? $this->input->post('Marca') : NULL,
                'Modelo' => ($this->input->post('Modelo') !== NULL) ? $this->input->post('Modelo') : NULL,
                'NoSerie' => ($this->input->post('NoSerie') !== NULL) ? $this->input->post('NoSerie') : NULL,
                'Departamento' => ($this->input->post('Departamento') !== NULL) ? $this->input->post('Departamento') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->maquinaria_model->onModificar($ID, $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->maquinaria_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
