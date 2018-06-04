<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->library('Myfpdf');
        $this->load->model('pedidos_model')->model('estilos_model')
                ->model('clientes_model')->model('combinaciones_model')
                ->model('generales_model')->model('listasdeprecios_model')
                ->model('vendedores_model')->model('piezasymateriales_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vPedidos')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onModificarImportes() {
        try {
            $x = $this->input;
            $data = array(
                'Importe' => ($x->post('Importe') !== NULL) ? $x->post('Importe') : NULL,
                'Pares' => ($x->post('Pares') !== NULL) ? $x->post('Pares') : NULL,
                'Descuento' => ($x->post('Descuento') !== NULL) ? $x->post('Descuento') : NULL
            );
            $this->pedidos_model->onModificar($x->post('ID'), $data);
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
            print json_encode($this->estilos_model->getEncabezadoSerieXEstilo($this->input->post('Estilo')));
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
            print json_encode($this->pedidos_model->getDetalleByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidoByID() {
        try {
            print json_encode($this->pedidos_model->getPedidoByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgentes() {
        try {
            print json_encode($this->vendedores_model->getVendedores());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            print json_encode($this->clientes_model->getClientes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgenteXCliente() {
        try {
            print json_encode($this->pedidos_model->getAgenteXCliente($this->input->get('Cliente')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->estilos_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            print json_encode($this->combinaciones_model->getCombinacionesXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            print json_encode($this->estilos_model->getSerieXEstilo($this->input->post('Estilo')));
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
            $x = $this->input;
            $data = array(
                'Cliente' => ($x->post('Cliente') !== NULL) ? $x->post('Cliente') : NULL,
                'Agente' => ($x->post('Agente') !== NULL) ? $x->post('Agente') : NULL,
                'Registro' => Date('d/m/Y h:i:s a'),
                'FechaPedido' => ($x->post('FechaPedido') !== NULL) ? $x->post('FechaPedido') : NULL,
                'FechaRec' => ($x->post('FechaRec') !== NULL) ? $x->post('FechaRec') : NULL,
                'RecibidoX' => ($x->post('RecibidoX') !== NULL) ? $x->post('RecibidoX') : NULL,
                'Estatus' => 'ACTIVO',
                'Folio' => ($x->post('Folio') !== NULL) ? $x->post('Folio') : NULL,
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
                    'Ano' => Date('Y'),
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
            $x = $this->input;
            $data = array(
                'Cliente' => ($x->post('Cliente') !== NULL) ? $x->post('Cliente') : NULL,
                'Agente' => ($x->post('Agente') !== NULL) ? $x->post('Agente') : NULL,
                'FechaPedido' => ($x->post('FechaPedido') !== NULL) ? $x->post('FechaPedido') : NULL,
                'FechaRec' => ($x->post('FechaRec') !== NULL) ? $x->post('FechaRec') : NULL,
                'RecibidoX' => ($x->post('RecibidoX') !== NULL) ? $x->post('RecibidoX') : NULL,
            );
            $this->pedidos_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->pedidos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle() {
        try {
            $this->pedidos_model->onEliminarDetalle($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXDetalleByID() {
        try {
            print json_encode($this->pedidos_model->getSerieXDetalleByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function ImprimirPedido() {
        try {
            $pdf = new FPDF('P', 'mm', array(235, 297));
            $pdf->AddPage();
            $image = "lsbck.png";
            $pdf->Image('img/' . $image, /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 35, /* ALTO */ 17.5);
            $pdf->SetFont('Arial', 'B', 16);
            /* ENCABEZADO */
            //TITULO
            $pdf->SetY(5);
            $pdf->SetX(40);
            $pdf->Cell(/* ANCHO */225, 7.5/* ALTO */, 'PEDIDOX'/* CONTENIDO */, 0/* BORDE 0 = N, 1 = Y */, 0/* SALTO LN */, 'L'/* ALINEACION */, false/* RELLENO */);
            $pdf->Rect(40/* POS EN X */, 5/* POS EN Y */, 190/* ANCHO */, 7.5/* ALTO */, 'D');

            /* FIN ENCABEZADO */
            /* DETALLE */

            /* SUB DETALLE */
            /* FIN SUB DETALLE */

            /* FIN DETALLE */

            /* PIE */

            /* FIN PIE */


            if (!file_exists('uploads/Pedidos')) {
                mkdir('uploads/Pedidos', 0777, true);
            }
            if (!file_exists('uploads/Pedidos/' . $this->input->get('ID'))) {
                mkdir('uploads/Pedidos/' . $this->input->get('ID'), 0777, true);
            }
            $url = 'uploads/Pedidos/' . $this->input->get('ID') . '/PEDIDO_' . $this->input->get('ID') . '_' . Date('d') . '_' . Date('m') . '_' . Date('Y') . '.pdf';

            if (delete_files('uploads/Pedidos/' . $this->input->get('ID') . '/')) {

            }
            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
