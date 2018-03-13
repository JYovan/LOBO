<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Series extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('series_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vSeries');
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


            $data = $this->series_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSeriesDetallebySerieID() {
        try {
            extract($this->input->post());
            $data = $this->series_model->getSeriesDetallebySerieID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieByID() {
        try {
            extract($this->input->post());
            $data = $this->series_model->getSerieByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'PuntoInicial' => ($this->input->post('PuntoInicial') !== NULL) ? $this->input->post('PuntoInicial') : NULL,
                'PuntoFinal' => ($this->input->post('PuntoFinal') !== NULL) ? $this->input->post('PuntoFinal') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $ID = $this->series_model->onAgregar($data);
            echo $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
        try {
            $data = array(
                'Serie_ID' => ($this->input->post('Serie_ID') !== NULL) ? $this->input->post('Serie_ID') : NULL,
                'Talla' => ($this->input->post('Talla') !== NULL) ? $this->input->post('Talla') : NULL,
                'Cantidad' => 0
            );
            $this->series_model->onAgregarDetalle($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'PuntoInicial' => ($this->input->post('PuntoInicial') !== NULL) ? $this->input->post('PuntoInicial') : NULL,
                'PuntoFinal' => ($this->input->post('PuntoFinal') !== NULL) ? $this->input->post('PuntoFinal') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->series_model->onModificar($ID, $DATA);
            /* MODIFICAR DETALLE */
            $tallas = json_decode($this->input->post("Tallas"));
            foreach ($tallas as $key => $v) {
                $data = array(
                    'Serie_ID' => $v->Serie_ID,
                    'Talla' => $v->Talla,
                    'Cantidad' => $v->Cantidad
                );
                $this->series_model->onModificarDetalle($v->ID,$data); 
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->series_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}