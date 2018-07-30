<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('compras_model');
        $this->load->model('proveedores_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vCompras');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getMaterialesRequeridos() {
        try {
            print json_encode($this->compras_model->getMaterialesRequeridos($this->input->get('Familia')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            print json_encode($this->proveedores_model->getProveedores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->compras_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUID() {
        try {
            print json_encode($this->compras_model->getUID());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCompraByID() {
        try {
            print json_encode($this->compras_model->getCompraByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleCompraByID() {
        try {
            print json_encode($this->compras_model->getDetalleCompraByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Folio' => ($this->input->post('Folio') !== NULL) ? $this->input->post('Folio') : NULL,
                'Fecha' => ($this->input->post('Fecha') !== NULL) ? $this->input->post('Fecha') : NULL,
                'Maq' => ($this->input->post('Maq') !== NULL) ? $this->input->post('Maq') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Sem' => ($this->input->post('Sem') !== NULL) ? $this->input->post('Sem') : NULL,
                'Grupo' => ($this->input->post('Grupo') !== NULL) ? $this->input->post('Grupo') : NULL,
                'Tp' => ($this->input->post('Tp') !== NULL) ? $this->input->post('Tp') : NULL,
                'Importe' => 0,
                'Proveedor' => ($this->input->post('Proveedor') !== NULL) ? $this->input->post('Proveedor') : NULL,
                'Estatus' => 'ACTIVO',
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->compras_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
        try {
            $e = $this->input;
            $stt = $e->post('Precio') * $e->post('Cantidad');
            $this->db->insert("sz_ComprasDetalle", array(
                'OrdenCompra' => $e->post('IDC'),
                'Articulo' => $e->post('Articulo'),
                'ArticuloT' => strtoupper($e->post('ArticuloT')),
                'Cantidad' => $e->post('Cantidad'),
                'Precio' => $e->post('Precio'),
                'Subtotal' => $stt,
                'FechaEntrega' => $e->post('FechaEntrega'),
                'ConsignarA' => $e->post('ConsignarA'),
                'Observaciones' => $e->post('Observaciones')
            ));
            $this->db->set('Importe', '(SELECT SUM(CD.Subtotal) FROM sz_ComprasDetalle AS CD WHERE CD.OrdenCompra = ' . $e->post('IDC') . ')', false)
                    ->where('ID', $e->post('IDC'))->update('sz_Compras');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {
            $x = $this->input;
            $d = $this->db;
            switch ($x->post('CELDA')) {
                case 'CANTIDAD':
                    $d->set('Cantidad', $x->post('VALOR'));
                    $d->set('Subtotal', $x->post('SUBTOTAL'));
                    break;
                case 'PRECIO':
                    $d->set('Precio', $x->post('VALOR'));
                    $d->set('Subtotal', $x->post('SUBTOTAL'));
                    break;
            }
            $d->where('ID', $x->post('ID'))->update('sz_ComprasDetalle');
            $this->db->set('Importe', '(SELECT SUM(CD.Subtotal) FROM sz_ComprasDetalle AS CD WHERE CD.OrdenCompra = ' . $x->post('PARENT') . ')', false)
                    ->where('ID', $x->post('PARENT'))->update('sz_Compras');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Fecha' => ($this->input->post('Fecha') !== NULL) ? $this->input->post('Fecha') : NULL,
                'Maq' => ($this->input->post('Maq') !== NULL) ? $this->input->post('Maq') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Sem' => ($this->input->post('Sem') !== NULL) ? $this->input->post('Sem') : NULL,
                'Grupo' => ($this->input->post('Grupo') !== NULL) ? $this->input->post('Grupo') : NULL,
                'Tp' => ($this->input->post('Tp') !== NULL) ? $this->input->post('Tp') : NULL,
                'Proveedor' => ($this->input->post('Proveedor') !== NULL) ? $this->input->post('Proveedor') : NULL,
            );
            $this->compras_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->compras_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCompraDetalleByID() {
        try {
            extract($this->input->post());
            $this->compras_model->onEliminarCompraDetalleByID($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
