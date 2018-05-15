<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('vendedores_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vVendedores');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            $data = $this->vendedores_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUltimaClave() {
        try {
            $Datos = $this->vendedores_model->getUltimaClave();
            $Clave = $Datos[0]->Clave;
            if (empty($Clave)) {
                $Clave = 1;
            } else {
                $Clave = $Clave + 1;
            }

            print $Clave;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVendedorByID() {
        try {
            extract($this->input->post());
            $data = $this->vendedores_model->getVendedorByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'IdVendedor' => ($this->input->post('IdVendedor') !== NULL) ? $this->input->post('IdVendedor') : NULL,
                'Nombre' => ($this->input->post('Nombre') !== NULL) ? $this->input->post('Nombre') : NULL,
                'Comision' => ($this->input->post('Comision') !== NULL) ? $this->input->post('Comision') : NULL,
                'Esquema' => 1,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Foto' => ''
            );
            $ID = $this->vendedores_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $DATA = array(
                'Nombre' => ($this->input->post('Nombre') !== NULL) ? $this->input->post('Nombre') : NULL,
                'Comision' => ($this->input->post('Comision') !== NULL) ? $this->input->post('Comision') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Foto' => ''
            );
            $this->vendedores_model->onModificar($this->input->post('IdVendedor'), $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->vendedores_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
