<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FraccionesXEstilo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('fraccionesxestilo_model');
        $this->load->model('estilos_model');
        $this->load->model('fracciones_model');
        $this->load->model('departamentos_model');
        $this->load->model('puestos_model');
        $this->load->model('maquinaria_model');
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
            print $_GET['callback'] . '(' . json_encode($this->fraccionesxestilo_model->getRecords()) . ');'; /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            extract($this->input->post());
            $data = $this->departamentos_model->getDepartamentos();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPuestos() {
        try {
            extract($this->input->post());
            $data = $this->puestos_model->getPuestos();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquinaria() {
        try {
            extract($this->input->post());
            $data = $this->maquinaria_model->getMaquinaria();
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

    public function getFraccionesEstiloXEstiloDetalle() {
        try {
            print json_encode($this->fraccionesxestilo_model->getFraccionesEstiloXEstiloDetalle($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionEstiloByIDEstilo() {
        try {
            extract($this->input->post());
            $data = $this->fraccionesxestilo_model->getFraccionEstiloByIDEstilo($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Fecha' => ($this->input->post('Fecha') !== NULL) ? $this->input->post('Fecha') : NULL,
                'TiempoEstandarE' => ($this->input->post('TiempoEstandarE') !== NULL) ? $this->input->post('TiempoEstandarE') : NULL,
                'Fraccion' => ($this->input->post('Fraccion') !== NULL) ? $this->input->post('Fraccion') : NULL,
                'Maquinaria' => ($this->input->post('Maquinaria') !== NULL) ? $this->input->post('Maquinaria') : NULL,
                'Puesto' => ($this->input->post('Puesto') !== NULL) ? $this->input->post('Puesto') : NULL,
                'TiempoEstandarD' => ($this->input->post('TiempoEstandarD') !== NULL) ? $this->input->post('TiempoEstandarD') : 0,
                'Eficiencia' => ($this->input->post('Eficiencia') !== NULL) ? $this->input->post('Eficiencia') : 0,
                'TiempoReal' => ($this->input->post('TiempoReal') !== NULL) ? $this->input->post('TiempoReal') : 0,
                'CostoFraccionManoObra' => ($this->input->post('CostoFraccionManoObra') !== NULL) ? $this->input->post('CostoFraccionManoObra') : 0,
                'CostoFraccionVentas' => ($this->input->post('CostoFraccionVentas') !== NULL) ? $this->input->post('CostoFraccionVentas') : 0,
                'SueldoBase' => ($this->input->post('SueldoBase') !== NULL) ? $this->input->post('SueldoBase') : 0,
                'Estatus' => 'ACTIVO'
            );
            $ID = $this->fraccionesxestilo_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEditarFraccionesEstiloDetalle() {
        try {
            extract($this->input->post());
            unset($_POST['ID']);
            $this->fraccionesxestilo_model->onModificar($ID, $this->input->post());
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
