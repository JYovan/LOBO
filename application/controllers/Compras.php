<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('compras_model');
        $this->load->model('proveedores_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vCompras');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getMaterialesRequeridos() {
        try {
            print json_encode($this->compras_model->getMaterialesRequeridos($this->input->get('Familia')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            $data = $this->proveedores_model->getProveedores();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());
            $data = $this->compras_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCompraByID() {
        try {
            $data = $this->compras_model->getCompraByID($this->input->get('ID'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleCompraByID() {
        try {
            $data = $this->compras_model->getDetalleCompraByID($this->input->post('ID'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Folio' => ($this->input->post('Folio') !== NULL) ? $this->input->post('Folio') : NULL,
                'Fecha' => ($this->input->post('Fecha') !== NULL) ? $this->input->post('Fecha') : NULL,
                'Maq' => ($this->input->post('Maq') !== NULL) ? $this->input->post('Maq') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Sem' => ($this->input->post('Sem') !== NULL) ? $this->input->post('Sem') : NULL,
                'Grupo' => ($this->input->post('Grupo') !== NULL) ? $this->input->post('Grupo') : NULL,
                'Tp' => ($this->input->post('Tp') !== NULL) ? $this->input->post('Tp') : NULL,
                'Importe' => 0,
                'Proveedor' => ($this->input->post('Proveedor') !== NULL) ? $this->input->post('Proveedor') : NULL,
                'Estatus' => 'ACTIVO',
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->compras_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Fecha' => ($this->input->post('Fecha') !== NULL) ? $this->input->post('Fecha') : NULL,
                'Maq' => ($this->input->post('Maq') !== NULL) ? $this->input->post('Maq') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Sem' => ($this->input->post('Sem') !== NULL) ? $this->input->post('Sem') : NULL,
                'Grupo' => ($this->input->post('Grupo') !== NULL) ? $this->input->post('Grupo') : NULL,
                'Tp' => ($this->input->post('Tp') !== NULL) ? $this->input->post('Tp') : NULL,
                'Proveedor' => ($this->input->post('Proveedor') !== NULL) ? $this->input->post('Proveedor') : NULL,
            );
            $this->compras_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->compras_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCompraDetalleByID() {
        try {
            extract($this->input->post());
            $this->compras_model->onEliminarCompraDetalleByID($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
