<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListaDePrecios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session');
        $this->load->model('listasdeprecios_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vListasDePrecios');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print $_GET['callback'] . '(' . json_encode($this->listasdeprecios_model->getRecords()) . ');'; /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getListaByID() {
        try {
            print json_encode($this->listasdeprecios_model->getListaByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getListaDetalleByID() {
        try {
            print json_encode($this->listasdeprecios_model->getListaDetalleByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->listasdeprecios_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array('Descripcion' => $this->input->post('Descripcion'),
                'Estatus' => $this->input->post('Estatus'), 'FechaCreacion' => Date('d/m/Y h:i:s a'));
            $ID = $this->listasdeprecios_model->onAgregar($data);

            $lista = json_decode($this->input->post("Lista"));
            foreach ($lista as $key => $v) {
                $data = array(
                    'Lista' => $ID,
                    'Estilo' => $v->Estilo,
                    'Precio' => $v->Precio,
                    'FechaDelPrecio' => Date('d/m/Y h:i:s a')
                );
                $this->listasdeprecios_model->onAgregarDetalle($data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->listasdeprecios_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            /* ENCABEZADO */
            $data = array('Descripcion' => $this->input->post('Descripcion'),
                'Estatus' => $this->input->post('Estatus'));
            $this->listasdeprecios_model->onModificar($this->input->post('ID'), $data);

            /* NUEVOS */
            $lista = json_decode($this->input->post("Agregados"));
            foreach ($lista as $key => $v) {
                $data = array(
                    'Lista' => $this->input->post('ID'),
                    'Estilo' => $v->Estilo,
                    'Precio' => $v->Precio,
                    'FechaDelPrecio' => Date('d/m/Y h:i:s a')
                );
                $this->listasdeprecios_model->onAgregarDetalle($data);
            }

            /* ELIMINADOS */
            $removidos = json_decode($this->input->post("Removidos"));
            foreach ($removidos as $key => $v) {
                $this->listasdeprecios_model->onEliminarDetalle($v->ID, $this->input->post('ID'));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}