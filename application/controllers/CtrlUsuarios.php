<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlUsuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('usuario_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vUsuarios');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            $data = $this->usuario_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUsuarioByID() {
        try {
            extract($this->input->post());
            $data = $this->usuario_model->getUsuarioByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Usuario' => ($this->input->post('Usuario') !== NULL) ? $this->input->post('Usuario') : NULL,
                'Contrasena' => ($this->input->post('Contrasena') !== NULL) ? $this->input->post('Contrasena') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'Correo' => ($this->input->post('Correo') !== NULL) ? $this->input->post('Correo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Registro' => Date('d/m/Y h:i:s a')
            ); 
            $this->usuario_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Usuario' => ($Usuario !== NULL) ? $Usuario : NULL,
                'Contrasena' => ($Contrasena !== NULL) ? $Contrasena : NULL,
                'Correo' => ($Correo !== NULL) ? $Correo : NULL,
                'Tipo' => ($Tipo !== NULL) ? $Tipo : NULL,
                'Estatus' => ($Estatus !== NULL) ? $Estatus : NULL
            );
            $this->usuario_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->usuario_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
