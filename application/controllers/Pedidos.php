<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->library('Myfpdf');
        $this->load->model('pedidos_model')->model('estilos_model')->model('clientes_model')->model('combinaciones_model')
                ->model('generales_model')->model('listasdeprecios_model')
                ->model('vendedores_model')->model('cerrarprog_model')->model('semanas_model');
        /* ->model('piezasymateriales_model'); */
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

    /*
      public function getPiezasMatFichaTecnicaXEstiloXCombinacion() {
      try {
      $data = $this->piezasymateriales_model->getPiezasMatFichaTecnicaXEstiloXCombinacion($this->input->post('Estilo'), $this->input->post('Color'));
      print json_encode($data);
      } catch (Exception $exc) {
      echo $exc->getTraceAsString();
      }
      } */

    public function getEncabezadoSerieXEstilo() {
        try {
            print json_encode($this->estilos_model->getEncabezadoSerieXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioListaByEstiloByCliente() {
        try {
            print json_encode($this->listasdeprecios_model->getPrecioListaByEstiloByCliente($this->input->get('Estilo'), $this->input->get('Cliente')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaByFecha() {
        try {
            print json_encode($this->semanas_model->getSemanaByFecha($this->input->get('Fecha')));
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
            print json_encode($this->pedidos_model->getPedidoByID($this->input->get('ID')));
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
            print json_encode($this->combinaciones_model->getCombinacionesXEstilo($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            print json_encode($this->estilos_model->getSerieXEstilo($this->input->get('Estilo')));
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

    public function onAgregarDetalle36() {
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
                $this->pedidos_model->onAgregarDetalle($data);
            }
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
                    $DATA = array(
                        $v->Posicion => $v->Cantidad
                    );
                    $this->db->where('Estilo', $v->Estilo)->where('Combinacion', $v->Combinacion)->where('Pedido', $v->Pedido)->update("sz_PedidosDetalle", $DATA);
                } else {
                    $this->pedidos_model->onAgregarDetalle($data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetallex() {
        try {
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Pedido' => $v->Pedido, 'FechaEntrega' => $v->FechaEntrega,
                    'Maq' => $v->Maq, 'Sem' => $v->Sem,
                    'Ano' => Date('Y'), 'Recio' => $v->Recio,
                    'Precio' => $v->Precio, 'Estilo' => $v->Estilo,
                    'Desc_Por' => $v->Desc_Por, 'Combinacion' => $v->Combinacion,
                    'Observaciones' => $v->Observaciones, $v->Posicion => $v->Cantidad
                );
                $Existe = $this->pedidos_model->onComprobarEstiloXCombinacion($v->Pedido, $v->Estilo, $v->Combinacion);
                if ($Existe[0]->EXISTE > 0) {

                    $total_x_fila = $this->pedidos_model->onComprobarCantidadPorFila($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion);
                    if (count($total_x_fila) > 0) {
//                        $total_x_fila = $total_x_fila[0]->x36;
//                        $total_x_fila_mas_lote = $total_x_fila + $v->Cantidad;
//                        if ($v->Cantidad === 36 && $total_x_fila === 36) {
                        $this->pedidos_model->onAgregarDetalle($data);
//                        }
//                        if ($v->Cantidad === 36 && $total_x_fila === 0) {
//                            $this->pedidos_model->onAgregarDetalle($data);
//                        }
//                        if ($v->Cantidad < 36 && $total_x_fila < 37) {
//                            $this->pedidos_model->onAgregarDetalle($data);
//                        }
//                        if ($total_x_fila < 36 && $total_x_fila_mas_lote <= 36) {
//                            $nueva_cantidad = (36 - $total_x_fila );
//                            $restante = $v->Cantidad - $nueva_cantidad;
//                            $this->db->where('Estilo', $v->Estilo)->where('Combinacion', $v->Combinacion)->where('Pedido', $v->Pedido)
//                                    ->where('(C1 + C2 + C3 + C4 + C5 + C6 + C7 + C8 + C9 + C10 + C11 + C12 + C13 + C14 + C15 + C16 + C17 + C18 + C19 + C20 + C21 + C22) < 36', null, false)
//                                    ->update("sz_PedidosDetalle", array($v->Posicion => $nueva_cantidad));
//                        }
//                        
//                        if ($total_x_fila < 36 && $total_x_fila_mas_lote > 36) {
//                            $nueva_cantidad = (36 - $total_x_fila );
//                            $restante = $v->Cantidad - $nueva_cantidad;
//                            print "\n onModificarDetalle($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion, $v->Cantidad-$nueva_cantidad); $restante \n";
//
//                            $this->pedidos_model->onModificarDetalle($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion, $nueva_cantidad);
//                            if ($restante > 0) {
//                                $data[$v->Posicion] = $v->Cantidad - $nueva_cantidad;
//                                $this->pedidos_model->onAgregarDetalle($data);
//                                print "\n SE AGREGO UN RESTANTE DE $restante ($v->Cantidad - $nueva_cantidad)  \n";
//                            }
//                        }
//                        /* PARA TODO LO QUE ES MENOR A 36 */
//                        if ($total_x_fila < 37 && $total_x_fila_mas_lote < 37) {
//                            print "\n onModificarDetalle($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion, $v->Cantidad); \n";
//                            $this->pedidos_model->onModificarDetalle($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion, $v->Cantidad);
//                        }
                    }
                } else {
                    print "\n AGREGANDO 1, $v->Posicion , $v->Estilo, $v->Combinacion\n";
                    $this->pedidos_model->onAgregarDetalle($data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalleLimite() {
        try {
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Pedido' => $v->Pedido, 'FechaEntrega' => $v->FechaEntrega, 'Maq' => $v->Maq, 'Sem' => $v->Sem, 'Ano' => Date('Y'),
                    'Recio' => $v->Recio, 'Precio' => $v->Precio, 'Estilo' => $v->Estilo, 'Desc_Por' => $v->Desc_Por,
                    'Combinacion' => $v->Combinacion, 'Observaciones' => $v->Observaciones, $v->Posicion => $v->Cantidad
                );
                $Existe = $this->pedidos_model->onComprobarEstiloXCombinacion($v->Pedido, $v->Estilo, $v->Combinacion);
                if ($Existe[0]->EXISTE > 0) {
                    $total_x_fila = $this->pedidos_model->onComprobarCantidadPorFila($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion);
                    if (count($total_x_fila) > 0) {
                        $total_x_fila = $total_x_fila[0]->x36;
                        if (count($total_x_fila) > 0 && $total_x_fila < 36) {
                            print "\n * TOTAL POR FILA * $total_x_fila \n";
                            $this->pedidos_model->onModificarDetalle($v->Pedido, $v->Estilo, $v->Combinacion, $v->Posicion, $v->Cantidad);
                        }
                        if ($total_x_fila < 36) {
                            print "TOTAL POR FILA $total_x_fila, agregarle $v->Cantidad";
                        }
                    }
                } else {
                    print "\nAGREGANDO\n";
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

    public function onModificarPedidoDetalle() {
        try {
            $row = $this->input;
            switch ($row->post('CELDA')) {
                case 'SEMANA':
                    print "MODIFICANDO SEMANA:\n";
                    $Y = substr(Date('Y'), 2);
                    $M = str_pad($row->post('MAQUILA'), 2, '0', STR_PAD_LEFT);
                    $S = str_pad($row->post('SEMANA'), 2, '0', STR_PAD_LEFT);
                    $MAX = $this->cerrarprog_model->getMaximoConsecutivo($row->post('MAQUILA'), $row->post('SEMANA'), $row->post('ID'));
                    $FMAX = 0;
                    if (count($MAX) <= 0) {
                        $FMAX = '1';
                    } else {
                        $FMAX = $MAX[0]->MAX;
                    }
                    print "\n MAX " . $FMAX . "\n";
                    $C = str_pad($FMAX, 3, '0', STR_PAD_LEFT);
                    $this->db->set('ctSem', $S)->set('ctMaq', $M)->set('ctCons', $C)->set('Control', $Y . $S . $M . $C)
                            ->where('PedidoDetalle', $row->post('ID'))->update('sz_Controles');
                    $this->db->set('Sem', $row->post('SEMANA'))->where('ID', $row->post('ID'))->update('sz_PedidosDetalle');
                    break;
                case 'MAQUILA':
                    print "MODIFICANDO MAQUILA:\n";
                    print_r($row->post());
                    $Y = substr(Date('Y'), 2);
                    $M = str_pad($row->post('MAQUILA'), 2, '0', STR_PAD_LEFT);
                    $S = str_pad($row->post('SEMANA'), 2, '0', STR_PAD_LEFT);
                    $MAX = $this->cerrarprog_model->getMaximoConsecutivo($row->post('MAQUILA'), $row->post('SEMANA'), $row->post('ID'));
                    $FMAX = 0;
                    if (count($MAX) <= 0) {
                        $FMAX = '1';
                    } else {
                        $FMAX = $MAX[0]->MAX;
                    }
                    $C = str_pad($FMAX, 3, '0', STR_PAD_LEFT);
                    $this->db->set('ctSem', $S)->set('ctMaq', $M)->set('ctCons', $C)->set('Control', $Y . $S . $M . $C)
                            ->where('PedidoDetalle', $row->post('ID'))->update('sz_Controles');
                    $this->db->set('Maq', $row->post('MAQUILA'))->where('ID', $row->post('ID'))->update('sz_PedidosDetalle');
                    break;
                case 'CANTIDAD':
                    print "MODIFICANDO CANTIDAD/SERIE:\n";
                    print_r($row->post());
                    print "\n";
                    $a = 4;
                    $b = array();
                    for ($index = 1; $index < 23; $index++) {
                        $b[$a] = $index;
                        $a += 1;
                    }
                    $this->db->set('C' . $b[$row->post('COLUMN')], $row->post('VALOR'))->where('ID', $row->post('ID'))->update('sz_PedidosDetalle');
                    break;
                case 'PRECIO':
                    print "MODIFICANDO PRECIO:\n";
                    print_r($row->post());
                    print "\n";
                    $this->db->set('Precio', $row->post('VALOR'))->where('ID', $row->post('ID'))->update('sz_PedidosDetalle');
                    break;
                case 'DESCUENTO':
                    print "MODIFICANDO DESCUENTO:\n";
                    print_r($row->post());
                    print "\n";
                    $this->db->set('Desc_Por', $row->post('VALOR'))->where('ID', $row->post('ID'))->update('sz_PedidosDetalle');
                    break;
                case 'ENTREGA':
                    print "MODIFICANDO ENTREGA:" . $row->post('VALOR');
                    $this->db->set('FechaEntrega', $row->post('VALOR'))->where('ID', $row->post('ID'))->update('sz_PedidosDetalle');
                    break;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarMSD() {
        try {
            $rows = json_decode($this->input->post('rows'), false);
            foreach ($rows as $k => $v) {
                if ($this->input->post("SEMANA") !== '') {
                    $MAQ = $this->input->post("MAQUILA") !== '' ? $this->input->post("MAQUILA") : $v->MAQUILA;
                    $SEM = $this->input->post("SEMANA") !== '' ? $this->input->post("SEMANA") : $v->SEMANA;
                    $Y = substr(Date('Y'), 2);
                    $M = str_pad($MAQ, 2, '0', STR_PAD_LEFT);
                    $S = str_pad($SEM, 2, '0', STR_PAD_LEFT);
                    $MAX = $this->cerrarprog_model->getMaximoConsecutivo($MAQ, $SEM, $v->ID);
                    $FMAX = 0;
                    if (count($MAX) <= 0) {
                        $FMAX = '1';
                    } else {
                        $FMAX = $MAX[0]->MAX;
                    }
                    $C = str_pad($FMAX, 3, '0', STR_PAD_LEFT);
                    $this->db->set('ctSem', $S)->set('ctCons', $C)->set('Control', $Y . $S . $M . $C)->where('PedidoDetalle', $v->ID)->update('sz_Controles');
                    $this->db->set('Sem', $S)->where('ID', $v->ID)->update('sz_PedidosDetalle');
                }
                if ($this->input->post("MAQUILA") !== '') {
                    $MAQ = $this->input->post("MAQUILA") !== '' ? $this->input->post("MAQUILA") : $v->MAQUILA;
                    $SEM = $this->input->post("SEMANA") !== '' ? $this->input->post("SEMANA") : $v->SEMANA;
                    $Y = substr(Date('Y'), 2);
                    $M = str_pad($MAQ, 2, '0', STR_PAD_LEFT);
                    $S = str_pad($SEM, 2, '0', STR_PAD_LEFT);
                    $MAX = $this->cerrarprog_model->getMaximoConsecutivo($MAQ, $SEM, $v->ID);
                    $FMAX = 0;
                    if (count($MAX) <= 0) {
                        $FMAX = '1';
                    } else {
                        $FMAX = $MAX[0]->MAX;
                    }
                    $C = str_pad($FMAX, 3, '0', STR_PAD_LEFT);
                    $this->db->set('ctMaq', $M)->set('ctCons', $C)->set('Control', $Y . $S . $M . $C)->where('PedidoDetalle', $v->ID)->update('sz_Controles');
                    $this->db->set('Maq', $M)->where('ID', $v->ID)->update('sz_PedidosDetalle');
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTallasCantidades() {
        try {
            $pedido_detalle = $this->pedidos_model->getCantidadesPedido(1);
            $serie_detalle = $this->pedidos_model->getSeriePedido(1);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}