<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session');
        $this->load->model('proveedores_model'); 
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vProveedores');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print $_GET['callback']. '(' . json_encode($this->proveedores_model->getRecords()). ');'; /*JSONP*/
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getRegimenesFiscales() {
        try {
            print json_encode($this->proveedores_model->getRegimenesFiscales());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function onComprobarProveedorXRFC() {
        try {
            print json_encode($this->proveedores_model->onComprobarProveedorXRFC($this->input->get('RFC')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getProveedorByID() {
        try {
            print json_encode($this->proveedores_model->getProveedorByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
                'IdProveedor' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : '',
                'Status' => ($x->post('Estatus') !== NULL && $x->post('Estatus') === 'ACTIVO') ? 'A' : 'I',
                'Nombre' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : '',
                'Direccion' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : '',
                'Colonia' => ($x->post('Colonia') !== NULL) ? $x->post('Colonia') : '',
                'Poblacion' => ($x->post('Ciudad') !== NULL) ? $x->post('Ciudad') : '',
                'Pais' => ($x->post('Pais') !== NULL) ? $x->post('Pais') : '',
                'RFC' => ($x->post('RFC') !== NULL) ? $x->post('RFC') : '',
                'CURP' => ($x->post('CURP') !== NULL) ? $x->post('CURP') : '',
                'Telefono1' => ($x->post('Telefono') !== NULL) ? $x->post('Telefono') : '',
                'Telefono2' => '',
                'Fax' => ($x->post('Fax') !== NULL) ? $x->post('Fax') : '',
                'CodigoPostal' => ($x->post('CP') !== NULL) ? $x->post('CP') : '',
                'IdClasificacion1' => NULL,
                'IdClasificacion2' => NULL,
                'IdClasificacion3' => NULL,
                'IdClasificacion4' => NULL,
                'IdClasificacion5' => NULL,
                'IdClasificacion6' => NULL,
                'AtencionCXP' => '',
                'AtencionCompras' => '',
                'DiasCredito' => 0,
                'LimiteCredito' => ($x->post('LimiteCredito') !== NULL && $x->post('LimiteCredito') !== '') ? $x->post('LimiteCredito') : 0.00,
                'Compras' => 0.00,
                'IdZona' => 0,
                'AplicacionContable' => 1,
                'IdCuenta' => '',
                'Descuento' => 0.00,
                'email' => '',
                'Saldo' => 0.00,
                'SaldoNF' => 0.00,
                'Observacion' => '',
                'IdCategoria' => 0,
                'Tipo' => '',
                'TipoOperacion' => '03',
                'Nacionalidad' => '',
                'NombreComercial' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : '',
                'IdMetodoPago' => 0,
                'Regimen' => 'F',
                'NombreB' => '',
                'ApellidoP' => '',
                'ApellidoM' => '',
                'calle' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : '',
                'noExterior' => ($x->post('NoExt') !== NULL) ? $x->post('NoExt') : '',
                'Estado' => ($x->post('Estado') !== NULL) ? $x->post('Estado') : '',
                'noInterior' => ($x->post('NoInt') !== NULL) ? $x->post('NoInt') : '',
                'CuentaComp' => ''
            );
            $ID = $this->proveedores_model->onAgregarMagnus($data);

            $data = array(
                'Clave' => $x->post('Clave'),
                'IDMAGNUS' => $ID,
                'RazonSocial' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : '',
                'RFC' => ($x->post('RFC') !== NULL) ? $x->post('RFC') : '',
                'Direccion' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : '',
                'NoExt' => ($x->post('NoExt') !== NULL) ? $x->post('NoExt') : '',
                'NoInt' => ($x->post('NoInt') !== NULL) ? $x->post('NoInt') : '',
                'Colonia' => ($x->post('Colonia') !== NULL) ? $x->post('Colonia') : '',
                'Ciudad' => ($x->post('Ciudad') !== NULL) ? $x->post('Ciudad') : '',
                'Estado' => ($x->post('Estado') !== NULL) ? $x->post('Estado') : '',
                'Pais' => ($x->post('Pais') !== NULL) ? $x->post('Pais') : '',
                'Correo' => ($x->post('Correo') !== NULL) ? $x->post('Correo') : '',
                'CP' => ($x->post('CP') !== NULL) ? $x->post('CP') : '',
                'RegimenFiscal' => ($x->post('RegimenFiscal') !== NULL) ? $x->post('RegimenFiscal') : '',
                'Telefono' => ($x->post('Telefono') !== NULL) ? $x->post('Telefono') : '',
                'LimiteCredito' => ($x->post('LimiteCredito') !== NULL) ? $x->post('LimiteCredito') : '',
                'PlazoPagos' => ($x->post('PlazoPagos') !== NULL) ? $x->post('PlazoPagos') : '',
                'Estatus' => ($x->post('Estatus') !== NULL) ? ($x->post('Estatus') === 'ACTIVO') ? 'ACTIVO' : 'INACTIVO' : NULL
            );
            $this->proveedores_model->onAgregar($data);


            /* SUBIR FOTO */
            $URL_DOC = 'uploads/Proveedores/';
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
                    $DATA = array(
                        'Foto' => ($img),
                    );
                    $this->proveedores_model->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->proveedores_model->onModificar($ID, $DATA);
                }
            }
            /* FIN SUBIR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $data = array(
                'Clave' => $x->post('Clave'), 
                'RazonSocial' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : '',
                'RFC' => ($x->post('RFC') !== NULL) ? $x->post('RFC') : '',
                'Direccion' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : '',
                'NoExt' => ($x->post('NoExt') !== NULL) ? $x->post('NoExt') : '',
                'NoInt' => ($x->post('NoInt') !== NULL) ? $x->post('NoInt') : '',
                'Colonia' => ($x->post('Colonia') !== NULL) ? $x->post('Colonia') : '',
                'Ciudad' => ($x->post('Ciudad') !== NULL) ? $x->post('Ciudad') : '',
                'Estado' => ($x->post('Estado') !== NULL) ? $x->post('Estado') : '',
                'Pais' => ($x->post('Pais') !== NULL) ? $x->post('Pais') : '',
                'Correo' => ($x->post('Correo') !== NULL) ? $x->post('Correo') : '',
                'CP' => ($x->post('CP') !== NULL) ? $x->post('CP') : '',
                'RegimenFiscal' => ($x->post('RegimenFiscal') !== NULL) ? $x->post('RegimenFiscal') : '',
                'Telefono' => ($x->post('Telefono') !== NULL) ? $x->post('Telefono') : '',
                'LimiteCredito' => ($x->post('LimiteCredito') !== NULL) ? $x->post('LimiteCredito') : '',
                'PlazoPagos' => ($x->post('PlazoPagos') !== NULL) ? $x->post('PlazoPagos') : '',
                'Estatus' => ($x->post('Estatus') !== NULL) ? ($x->post('Estatus') === 'ACTIVO') ? 'ACTIVO' : 'INACTIVO' : NULL
            );
            $this->proveedores_model->onModificar($x->post('ID'), $data);
            /* MODIFICAR FOTO */
            $Foto = $this->input->post('Foto');
            $ID = $this->input->post('ID');
            if (empty($Foto)) {
                if ($_FILES["Foto"]["tmp_name"] !== "") {
                    $URL_DOC = 'uploads/Proveedores';
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
                            $DATA = array(
                                'Foto' => ($img),
                            );
                            $this->proveedores_model->onModificar($ID, $DATA);
                        } else {
                            $DATA = array(
                                'Foto' => (null),
                            );
                            $this->proveedores_model->onModificar($ID, $DATA);
                        }
                    }
                }
            } else {
                $DATA = array(
                    'Foto' => (null),
                );
                $this->proveedores_model->onModificar($ID, $DATA);
            }
            /* FIN MODIFICAR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
}
