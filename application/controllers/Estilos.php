<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estilos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('estilos_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vEstilos');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->estilos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            print json_encode($this->estilos_model->getEstiloByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            var_dump($this->input->post());
            $data = array(
                'Linea' => ($this->input->post('Linea') !== NULL && $this->input->post('Linea') !== 'null') ? $this->input->post('Linea') : NULL,
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Familia' => ($this->input->post('Familia') !== NULL && $this->input->post('Familia') !== 'null') ? $this->input->post('Familia') : NULL,
                'Serie' => ($this->input->post('Serie') !== NULL && $this->input->post('Serie') !== 'null') ? $this->input->post('Serie') : NULL,
                'Horma' => ($this->input->post('Horma') !== NULL && $this->input->post('Horma') !== 'null') ? $this->input->post('Horma') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL && $this->input->post('Genero') !== 'null') ? $this->input->post('Genero') : NULL,
                'Desperdicio' => ($this->input->post('Desperdicio') !== NULL ) ? $this->input->post('Desperdicio') : NULL,
                'Liberado' => ($this->input->post('Liberado') !== NULL) ? $this->input->post('Liberado') : NULL,
                'Herramental' => ($this->input->post('Herramental') !== NULL) ? $this->input->post('Herramental') : NULL,
                'Maquila' => ($this->input->post('Maquila') !== NULL && $this->input->post('Maquila') !== 'null') ? $this->input->post('Maquila') : NULL,
                'Notas' => ($this->input->post('Notas') !== NULL) ? $this->input->post('Notas') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Temporada' => ($this->input->post('Temporada') !== NULL && $this->input->post('Temporada') !== 'null') ? $this->input->post('Temporada') : NULL,
                'PuntoCentral' => ($this->input->post('PuntoCentral') !== NULL) ? $this->input->post('PuntoCentral') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL && $this->input->post('Tipo') !== 'null') ? $this->input->post('Tipo') : NULL,
                'MaquilaPlantilla' => ($this->input->post('MaquilaPlantilla') !== NULL) ? $this->input->post('MaquilaPlantilla') : NULL,
                'TipoDeConstruccion' => ($this->input->post('TipoDeConstruccion') !== NULL) ? $this->input->post('TipoDeConstruccion') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Registro' => Date('d/m/Y h:i:s a')
            );
            $this->estilos_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'Linea' => ($this->input->post('Linea') !== NULL) ? $this->input->post('Linea') : NULL,
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Familia' => ($this->input->post('Familia') !== NULL) ? $this->input->post('Familia') : NULL,
                'Serie' => ($this->input->post('Serie') !== NULL) ? $this->input->post('Serie') : NULL,
                'Horma' => ($this->input->post('Horma') !== NULL) ? $this->input->post('Horma') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL) ? $this->input->post('Genero') : NULL,
                'Desperdicio' => ($this->input->post('Desperdicio') !== NULL) ? $this->input->post('Desperdicio') : NULL,
                'Liberado' => ($this->input->post('Liberado') !== NULL) ? $this->input->post('Liberado') : NULL,
                'Herramental' => ($this->input->post('Herramental') !== NULL) ? $this->input->post('Herramental') : NULL,
                'Maquila' => ($this->input->post('Maquila') !== NULL) ? $this->input->post('Maquila') : NULL,
                'Notas' => ($this->input->post('Notas') !== NULL) ? $this->input->post('Notas') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Temporada' => ($this->input->post('Temporada') !== NULL) ? $this->input->post('Temporada') : NULL,
                'PuntoCentral' => ($this->input->post('PuntoCentral') !== NULL) ? $this->input->post('PuntoCentral') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'MaquilaPlantilla' => ($this->input->post('MaquilaPlantilla') !== NULL) ? $this->input->post('MaquilaPlantilla') : NULL,
                'TipoDeConstruccion' => ($this->input->post('TipoDeConstruccion') !== NULL) ? $this->input->post('TipoDeConstruccion') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->estilos_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->estilos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
