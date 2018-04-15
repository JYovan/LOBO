<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('permisos_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vPermisos');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->permisos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUsuarios() {
        try {
            print json_encode($this->permisos_model->getUsuarios());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getModulos() {
        try {
            print json_encode($this->permisos_model->getModulos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPermisoByID() {
        try {
            print json_encode($this->permisos_model->getPermisoByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'IdUsuario' => ($this->input->post('IdUsuario') !== NULL) ? $this->input->post('IdUsuario') : NULL,
                'UsuarioT' => ($this->input->post('UsuarioT') !== NULL) ? $this->input->post('UsuarioT') : NULL,
                'IdModulo' => ($this->input->post('IdModulo') !== NULL) ? $this->input->post('IdModulo') : NULL,
                'ModuloT' => ($this->input->post('ModuloT') !== NULL) ? $this->input->post('ModuloT') : NULL,
                'Ver' => ($this->input->post('Ver') !== NULL) ? $this->input->post('Ver') : NULL,
                'Crear' => ($this->input->post('Crear') !== NULL) ? $this->input->post('Crear') : NULL,
                'Modificar' => ($this->input->post('Modificar') !== NULL) ? $this->input->post('Modificar') : NULL,
                'Eliminar' => ($this->input->post('Eliminar') !== NULL) ? $this->input->post('Eliminar') : NULL,
                'Consultar' => ($this->input->post('Consultar') !== NULL) ? $this->input->post('Consultar') : NULL,
                'Reportes' => ($this->input->post('Reportes') !== NULL) ? $this->input->post('Reportes') : NULL,
                'Buscar' => ($this->input->post('Buscar') !== NULL) ? $this->input->post('Buscar') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Registro' => Date('d/m/Y h:i:s a')
            );
            $ID=$this->permisos_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'IdUsuario' => ($this->input->post('IdUsuario') !== NULL) ? $this->input->post('IdUsuario') : NULL,
                'UsuarioT' => ($this->input->post('UsuarioT') !== NULL) ? $this->input->post('UsuarioT') : NULL,
                'IdModulo' => ($this->input->post('IdModulo') !== NULL) ? $this->input->post('IdModulo') : NULL,
                'ModuloT' => ($this->input->post('ModuloT') !== NULL) ? $this->input->post('ModuloT') : NULL,
                'Ver' => ($this->input->post('Ver') !== NULL) ? $this->input->post('Ver') : NULL,
                'Crear' => ($this->input->post('Crear') !== NULL) ? $this->input->post('Crear') : NULL,
                'Modificar' => ($this->input->post('Modificar') !== NULL) ? $this->input->post('Modificar') : NULL,
                'Eliminar' => ($this->input->post('Eliminar') !== NULL) ? $this->input->post('Eliminar') : NULL,
                'Consultar' => ($this->input->post('Consultar') !== NULL) ? $this->input->post('Consultar') : NULL,
                'Reportes' => ($this->input->post('Reportes') !== NULL) ? $this->input->post('Reportes') : NULL,
                'Buscar' => ($this->input->post('Buscar') !== NULL) ? $this->input->post('Buscar') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->permisos_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->permisos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
