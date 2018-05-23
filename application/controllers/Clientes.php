<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session');
        $this->load->model('clientes_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vClientes');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print $_GET['callback'] . '(' . json_encode($this->clientes_model->getRecords()) . ');'; /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRegimenesFiscales() {
        try {
            print json_encode($this->clientes_model->getRegimenesFiscales());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getListasDePrecios() {
        try {
            print json_encode($this->clientes_model->getListasDePrecios());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClienteByID() {
        try {
            print json_encode($this->clientes_model->getClienteByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarClienteXRFC() {
        try {
            print json_encode($this->clientes_model->onComprobarClienteXRFC($this->input->get('ID'), $this->input->get('RFC')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            /* AGREGAR EN MAGNUS */
            $data = array(
                'Tipo' => 1,
                'IdCliente' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'IdPadre' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'RFC' => ($x->post('RFC') !== NULL) ? $x->post('RFC') : NULL,
                'Status' => ($x->post('Estatus') !== NULL) ? ($x->post('Estatus') === 'ACTIVO') ? 'A' : 'I' : NULL,
                'Nombre' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : NULL,
                'NombreComercial' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : NULL,
                'Direccion' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : NULL,
                'Colonia' => ($x->post('Colonia') !== NULL) ? $x->post('Colonia') : NULL,
                'Poblacion' => 1,
                'Pais' => 'MÉXICO',
                'CURP' => '',
                'CodigoPostal' => ($x->post('CP') !== NULL) ? $x->post('CP') : NULL,
                'DiasCredito' => 0,
                'LimiteCredito' => ($x->post('LimiteCredito') !== NULL && $x->post('LimiteCredito') !== '') ? $x->post('LimiteCredito') : 0,
                'Ventas' => 0.0,
                'AplicacionContable' => 1,
                'Descuento' => 0.0,
                'IdVendedor' => 0,
                'ComisionVendedor' => 0,
                'Tipo' => 1,
                'Saldo' => 0.0,
                'SaldoNF' => 0.0,
                'ListaPrecios' => 1
            );
            $ID = $this->clientes_model->onAgregarMagnus($data);
            $data = array(
                'IDMAGNUS' => $ID,
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'RazonSocial' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : NULL,
                'RFC' => ($x->post('RFC') !== NULL) ? $x->post('RFC') : NULL,
                'Direccion' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : NULL,
                'NoExt' => ($x->post('NoExt') !== NULL) ? $x->post('NoExt') : NULL,
                'NoInt' => ($x->post('NoInt') !== NULL) ? $x->post('NoInt') : NULL,
                'Colonia' => ($x->post('Colonia') !== NULL) ? $x->post('Colonia') : NULL,
                'Ciudad' => ($x->post('Ciudad') !== NULL) ? $x->post('Ciudad') : NULL,
                'Estado' => ($x->post('Estado') !== NULL) ? $x->post('Estado') : NULL,
                'Pais' => ($x->post('Pais') !== NULL) ? $x->post('Pais') : NULL,
                'CP' => ($x->post('CP') !== NULL) ? $x->post('CP') : NULL,
                'RegimenFiscal' => ($x->post('RegimenFiscal') !== NULL) ? $x->post('RegimenFiscal') : NULL,
                'Telefono' => ($x->post('Telefono') !== NULL) ? $x->post('Telefono') : NULL,
                'Correo' => ($x->post('Correo') !== NULL) ? $x->post('Correo') : NULL,
                'LimiteCredito' => ($x->post('LimiteCredito') !== NULL) ? $x->post('LimiteCredito') : 0,
                'PlazoPagos' => ($x->post('PlazoPagos') !== NULL) ? $x->post('PlazoPagos') : 0,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL,
                'ListaDePrecios' => ($x->post('ListaDePrecio') !== NULL) ? $x->post('ListaDePrecio') : NULL
            );
            $this->clientes_model->onAgregar($data);
            /* SUBIR FOTO */
            $URL_DOC = 'uploads/Clientes/';
            $master_url = $URL_DOC . '/';
            if (isset($_FILES["Foto"]["name"])) {
                if (!file_exists($URL_DOC)) {
                    mkdir($URL_DOC, 0777, true);
                }
                if (!file_exists(utf8_decode($URL_DOC . '/' . $ID))) {
                    mkdir(utf8_decode($URL_DOC . '/' . $ID), 0777, true);
                }
                if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $URL_DOC . '/' . $ID . '/' . utf8_decode($_FILES["Foto"]["name"]))) {
                    $img = $master_url . $ID . '/' . $_FILES["Foto"]["name"];
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $img;
                    $config['maintain_ratio'] = true;
                    $config['width'] = 850;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $DATA = array(
                        'Foto' => ($img),
                    );
                    $this->clientes_model->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->clientes_model->onModificar($ID, $DATA);
                }
            }
            print $ID;
            /* FIN SUBIR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            /* MODIFICAR EN MAGNUS */
            $data = array(
                'RFC' => ($x->post('RFC') !== NULL) ? $x->post('RFC') : NULL,
                'Status' => ($x->post('Estatus') !== NULL) ? ($x->post('Estatus') === 'ACTIVO') ? 'A' : 'I' : NULL,
                'Nombre' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : NULL,
                'NombreComercial' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : NULL,
                'Direccion' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : NULL,
                'Colonia' => ($x->post('Colonia') !== NULL) ? $x->post('Colonia') : NULL,
                'CodigoPostal' => ($x->post('CP') !== NULL) ? $x->post('CP') : NULL,
                'LimiteCredito' => ($x->post('LimiteCredito') !== NULL && $x->post('LimiteCredito') !== '') ? $x->post('LimiteCredito') : 0,
            );
            $this->clientes_model->onModificarMagnus($this->clientes_model->getMagnusID($this->input->post('ID'))[0]->MAGNUS, $data);
            $data = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'RazonSocial' => ($this->input->post('RazonSocial') !== NULL) ? $this->input->post('RazonSocial') : NULL,
                'RFC' => ($this->input->post('RFC') !== NULL) ? $this->input->post('RFC') : NULL,
                'Direccion' => ($this->input->post('Direccion') !== NULL) ? $this->input->post('Direccion') : NULL,
                'NoExt' => ($this->input->post('NoExt') !== NULL) ? $this->input->post('NoExt') : NULL,
                'NoInt' => ($this->input->post('NoInt') !== NULL) ? $this->input->post('NoInt') : NULL,
                'Colonia' => ($this->input->post('Colonia') !== NULL) ? $this->input->post('Colonia') : NULL,
                'Ciudad' => ($this->input->post('Ciudad') !== NULL) ? $this->input->post('Ciudad') : NULL,
                'Estado' => ($this->input->post('Estado') !== NULL) ? $this->input->post('Estado') : NULL,
                'Pais' => ($this->input->post('Pais') !== NULL) ? $this->input->post('Pais') : NULL,
                'CP' => ($this->input->post('CP') !== NULL) ? $this->input->post('CP') : NULL,
                'RegimenFiscal' => ($this->input->post('RegimenFiscal') !== NULL) ? $this->input->post('RegimenFiscal') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Correo' => ($this->input->post('Correo') !== NULL) ? $this->input->post('Correo') : NULL,
                'LimiteCredito' => ($this->input->post('LimiteCredito') !== NULL) ? $this->input->post('LimiteCredito') : 0,
                'PlazoPagos' => ($this->input->post('PlazoPagos') !== NULL) ? $this->input->post('PlazoPagos') : 0,
                'Estatus' => ($x->post('Estatus') !== NULL) ? ($x->post('Estatus') === 'ACTIVO') ? 'ACTIVO' : 'INACTIVO' : NULL,
                'ListaDePrecios' => ($this->input->post('ListaDePrecios') !== NULL) ? $this->input->post('ListaDePrecios') : NULL
            );
            $this->clientes_model->onModificar($x->post('ID'), $data);
            /* MODIFICAR FOTO */
            $Foto = $this->input->post('Foto');
            $ID = $this->input->post('ID');
            if (empty($Foto)) {
                if ($_FILES["Foto"]["tmp_name"] !== "") {
                    $URL_DOC = 'uploads/Clientes';
                    $master_url = $URL_DOC . '/';
                    if (isset($_FILES["Foto"]["name"])) {
                        if (!file_exists($URL_DOC)) {
                            mkdir($URL_DOC, 0777, true);
                        }
                        if (!file_exists(utf8_decode($URL_DOC . '/' . $ID))) {
                            mkdir(utf8_decode($URL_DOC . '/' . $ID), 0777, true);
                        }
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $URL_DOC . '/' . $ID . '/' . utf8_decode($_FILES["Foto"]["name"]))) {
                            $img = $master_url . $ID . '/' . $_FILES["Foto"]["name"];
                            $this->load->library('image_lib');
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $img;
                            $config['maintain_ratio'] = true;
                            $config['width'] = 850;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $DATA = array(
                                'Foto' => ($img),
                            );
                            $this->clientes_model->onModificar($ID, $DATA);
                        } else {
                            $DATA = array(
                                'Foto' => (null),
                            );
                            $this->clientes_model->onModificar($ID, $DATA);
                        }
                    }
                }
            } else {
                $DATA = array(
                    'Foto' => (null),
                );
                $this->clientes_model->onModificar($ID, $DATA);
            }
            /* FIN MODIFICAR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->clientes_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
