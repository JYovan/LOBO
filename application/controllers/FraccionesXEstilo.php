<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FraccionesXEstilo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('fraccionesxestilo_model');
        $this->load->model('estilos_model');
        $this->load->model('fracciones_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vFraccionesXEstilo');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->fraccionesxestilo_model->getRecords());
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

    public function getFraccionesXDepto() {
        try {
            extract($this->input->post());
            $data = $this->fracciones_model->getFraccionesXDepto($this->input->post('DepartamentoCat'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionesSeleccionar() {
        try {
            print json_encode($this->fracciones_model->getFraccionesSeleccionar());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstilo() {
        try {
            print json_encode($this->fraccionesxestilo_model->onComprobarExisteEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionByID() {
        try {
            extract($this->input->post());
            print json_encode($this->fracciones_model->getFraccionByID($ID));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            extract($this->input->post());
            print json_encode($this->estilos_model->getEstiloByID($Estilo));
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

    public function getFraccionesXEstiloDetallebyFraccionesXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->fraccionesxestilo_model->getFraccionesXEstiloDetallebyFraccionesXEstilo($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionXEstiloByID() {
        try {
            extract($this->input->post());
            $data = $this->fraccionesxestilo_model->getFraccionXEstiloByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Registro' => Date('d/m/Y h:i:s a')
            );
            $ID = $this->fraccionesxestilo_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
        try {
            $data = array(
                'FraccionXEstilo' => ($this->input->post('FraccionXEstilo') !== NULL) ? $this->input->post('FraccionXEstilo') : NULL,
                'Fraccion' => ($this->input->post('Fraccion') !== NULL) ? $this->input->post('Fraccion') : NULL,
                'Precio' => ($this->input->post('Precio') !== NULL) ? $this->input->post('Precio') : NULL,
                'Vale' => NULL,
                'Orden' => NULL,
                'Cantidad' => ($this->input->post('Cantidad') !== NULL) ? $this->input->post('Cantidad') : NULL
            );
            $this->fraccionesxestilo_model->onAgregarDetalle($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->fraccionesxestilo_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {

            extract($this->input->post());
            unset($_POST['ID']);
            $this->fraccionesxestilo_model->onModificarDetalle($ID, $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->fraccionesxestilo_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle() {
        try {
            extract($this->input->post());
            $this->fraccionesxestilo_model->onEliminarRenglonDetalle($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
