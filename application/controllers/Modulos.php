<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modulos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('modulos_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vModulos');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->modulos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    } 

    public function getModuloByID() {
        try {
            print json_encode($this->modulos_model->getModuloByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array( 
                'Modulo' => ($this->input->post('Modulo') !== NULL) ? $this->input->post('Modulo') : NULL,  
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Registro' => Date('d/m/Y h:i:s a')
            );
            $this->modulos_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'Modulo' => ($this->input->post('Modulo') !== NULL) ? $this->input->post('Modulo') : NULL, 
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->modulos_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->modulos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
