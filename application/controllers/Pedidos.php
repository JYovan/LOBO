<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session');
        $this->load->model('pedidos_model');
        $this->load->model('estilos_model');
        $this->load->model('clientes_model');
        $this->load->model('combinaciones_model');
        $this->load->model('generales_model');
        $this->load->model('listasdeprecios_model');
        $this->load->model('vendedores_model');
        $this->load->model('piezasymateriales_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vPedidos');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function onModificarImportes() {
        try {
            $data = array(
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL,
                'Pares' => ($this->input->post('Pares') !== NULL) ? $this->input->post('Pares') : NULL,
                'Descuento' => ($this->input->post('Descuento') !== NULL) ? $this->input->post('Descuento') : NULL
            );
            $this->pedidos_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasMatFichaTecnicaXEstiloXCombinacion() {
        try {

            $data = $this->piezasymateriales_model->getPiezasMatFichaTecnicaXEstiloXCombinacion($this->input->post('Estilo'), $this->input->post('Color'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEncabezadoSerieXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getEncabezadoSerieXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioListaByEstiloByCliente() {
        try {
            print json_encode($this->listasdeprecios_model->getPrecioListaByEstiloByCliente($this->input->post('Estilo'), $this->input->post('Cliente')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->pedidos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID() {
        try {
            extract($this->input->post());
            $data = $this->pedidos_model->getDetalleByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidoByID() {
        try {
            extract($this->input->post());
            $data = $this->pedidos_model->getPedidoByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgentes() {
        try {
            $data = $this->vendedores_model->getVendedores();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            extract($this->input->post());
            $data = $this->clientes_model->getClientes();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getEstilos();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->combinaciones_model->getCombinacionesXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getSerieXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarEstiloXCombinacion() {
        try {
            print json_encode($this->pedidos_model->onComprobarEstiloXCombinacion($this->input->get('ID'), $this->input->get('E'), $this->input->get('C')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {

            $data = array(
                'Cliente' => ($this->input->post('Cliente') !== NULL) ? $this->input->post('Cliente') : NULL,
                'Agente' => ($this->input->post('Agente') !== NULL) ? $this->input->post('Agente') : NULL,
                'Registro' => Date('d/m/Y h:i:s a'),
                'FechaPedido' => ($this->input->post('FechaPedido') !== NULL) ? $this->input->post('FechaPedido') : NULL,
                'FechaRec' => ($this->input->post('FechaRec') !== NULL) ? $this->input->post('FechaRec') : NULL,
                'RecibidoX' => ($this->input->post('RecibidoX') !== NULL) ? $this->input->post('RecibidoX') : NULL,
                'Estatus' => 'ACTIVO',
                'Folio' => ($this->input->post('Folio') !== NULL) ? $this->input->post('Folio') : NULL,
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->pedidos_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
        try {
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Pedido' => $v->Pedido,
                    'FechaEntrega' => $v->FechaEntrega,
                    'Maq' => $v->Maq,
                    'Sem' => $v->Sem,
                    'Recio' => $v->Recio,
                    'Precio' => $v->Precio,
                    'Estilo' => $v->Estilo,
                    'Desc_Por' => $v->Desc_Por,
                    'Combinacion' => $v->Combinacion,
                    'Observaciones' => $v->Observaciones,
                    $v->Posicion => $v->Cantidad
                );
                $Existe = $this->pedidos_model->onComprobarEstiloXCombinacion($v->Pedido, $v->Estilo, $v->Combinacion);
                if ($Existe[0]->EXISTE > 0) {
                    $this->pedidos_model->onModificarDetalle($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion, $v->Cantidad);
                } else {
                    $this->pedidos_model->onAgregarDetalle($data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'Cliente' => ($this->input->post('Cliente') !== NULL) ? $this->input->post('Cliente') : NULL,
                'Agente' => ($this->input->post('Agente') !== NULL) ? $this->input->post('Agente') : NULL,
                'FechaPedido' => ($this->input->post('FechaPedido') !== NULL) ? $this->input->post('FechaPedido') : NULL,
                'FechaRec' => ($this->input->post('FechaRec') !== NULL) ? $this->input->post('FechaRec') : NULL,
                'RecibidoX' => ($this->input->post('RecibidoX') !== NULL) ? $this->input->post('RecibidoX') : NULL,
            );
            $this->pedidos_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->pedidos_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle() {
        try {
            extract($this->input->post());
            $this->pedidos_model->onEliminarDetalle($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
