<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materiales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('materiales_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vMateriales');
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


            $data = $this->materiales_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialByID() {
        try {
            extract($this->input->post());
            $data = $this->materiales_model->getMaterialByID($ID);
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

    public function getFamilias() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('FAMILIAS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidades() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('UNIDADES');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Material' => ($this->input->post('Material') !== NULL) ? $this->input->post('Material') : NULL,
                'Departamento' => ($this->input->post('Departamento') !== NULL) ? $this->input->post('Departamento') : NULL,
                'Familia' => ($this->input->post('Familia') !== NULL) ? $this->input->post('Familia') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'UnidadCompra' => ($this->input->post('UnidadCompra') !== NULL) ? $this->input->post('UnidadCompra') : NULL,
                'UnidadConsumo' => ($this->input->post('UnidadConsumo') !== NULL) ? $this->input->post('UnidadConsumo') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'Minimo' => ($this->input->post('Minimo') !== NULL) ? $this->input->post('Minimo') : NULL,
                'Maximo' => ($this->input->post('Maximo') !== NULL) ? $this->input->post('Maximo') : NULL,
                'PrecioLista' => ($this->input->post('PrecioLista') !== NULL) ? $this->input->post('PrecioLista') : NULL,
                'PrecioTope' => ($this->input->post('PrecioTope') !== NULL) ? $this->input->post('PrecioTope') : NULL,
                'FechaUltimoInventario' => ($this->input->post('FechaUltimoInventario') !== NULL) ? $this->input->post('FechaUltimoInventario') : NULL,
                'Existencia' => ($this->input->post('Existencia') !== NULL) ? $this->input->post('Existencia') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->materiales_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Material' => ($this->input->post('Material') !== NULL) ? $this->input->post('Material') : NULL,
                'Departamento' => ($this->input->post('Departamento') !== NULL) ? $this->input->post('Departamento') : NULL,
                'Familia' => ($this->input->post('Familia') !== NULL) ? $this->input->post('Familia') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'UnidadCompra' => ($this->input->post('UnidadCompra') !== NULL) ? $this->input->post('UnidadCompra') : NULL,
                'UnidadConsumo' => ($this->input->post('UnidadConsumo') !== NULL) ? $this->input->post('UnidadConsumo') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'Minimo' => ($this->input->post('Minimo') !== NULL) ? $this->input->post('Minimo') : NULL,
                'Maximo' => ($this->input->post('Maximo') !== NULL) ? $this->input->post('Maximo') : NULL,
                'PrecioLista' => ($this->input->post('PrecioLista') !== NULL) ? $this->input->post('PrecioLista') : NULL,
                'PrecioTope' => ($this->input->post('PrecioTope') !== NULL) ? $this->input->post('PrecioTope') : NULL,
                'FechaUltimoInventario' => ($this->input->post('FechaUltimoInventario') !== NULL) ? $this->input->post('FechaUltimoInventario') : NULL,
                'Existencia' => ($this->input->post('Existencia') !== NULL) ? $this->input->post('Existencia') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->materiales_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->materiales_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
