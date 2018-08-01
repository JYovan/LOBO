<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Compras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('compras_model')->model('proveedores_model')->model('materiales_model')->helper('reportes_compras_helper');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vCompras')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
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

    public function getPrecioListaMaterial() {
        try {
            print json_encode($this->materiales_model->getPrecioListaMaterial($this->input->get('Material')));
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

    public function getReporteCompra() {
        $rows = $this->compras_model->getReporteCompraByID($this->input->post('ID'));
        $pdf = new FPDF_COMPRAS('L', 'mm', array(215.9, 279.4));
        $r = $rows[0];
        $pdf->OrdenCompra = $r->OrdenCompra;
        $pdf->Proveedor = $r->NombreProv;
        $pdf->ConsignarA = $r->ConsignarA;
        $pdf->Observaciones = $r->Observaciones;
        $pdf->Fecha = $r->Fecha;
        $pdf->Borders = 0;

        $pdf->AddPage();
        $pdf->SetAutoPageBreak(true, 35/* ALTO DEL FOOTER */);
        $pdf->SetX(5);
        $pdf->SetFont('Arial', 'B', 6.5);
        $anchos = array(15/* 0 */, 12/* 1 */, 103/* 2 */, 15/* 3 */, 20/* 4 */, 13/* 5 */, 19/* 6 */, 10/* 7 */, 17/* 8 */, 17/* 9 */, 29/* 10 */);
        $aligns = array('C', 'C', 'L', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C');
        $Cantidades = 0;
        $Subtotales = 0;
        foreach ($rows as $k => $v) {
            $pdf->SetFont('Arial', '', 6.5);
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            //for ($index = 0; $index < 10; $index++) {//PRUEBAS
            $pdf->Row(array(
                number_format($v->Cantidad, 2, '.', ', '), /* 0 */
                $v->Unidad, /* 1 */
                $v->Descripcion, /* 2 */
                "$ " . number_format($v->Precio, 2, '.', ', '), /* 3 */
                "$ " . number_format($v->Subtotal, 2, '.', ', '), /* 4 */
                $v->Semana, /* 5 */
                $v->ClaveArticulo, /* 6 */
                $v->Maquila, /* 7 */
                '', '',
                $v->FechaEntrega));
            $pdf->Line(5, $pdf->GetY(), 275, $pdf->GetY());
            $Cantidades += $v->Cantidad;
            $Subtotales += $v->Subtotal;
            // }//PRUEBAS
        }
        $pdf->Borders = 0;
        $pdf->SetX(5);
        $pdf->SetFont('Arial', 'B', 6.5); 
        $pdf->SetAligns(array('C', 'R', 'C'));
        $pdf->SetWidths(array(15/* 0 */, 130/* 1 */, 20/* 2 */));
        if ($r->FR === 2) {
            $pdf->Row(array(number_format($Cantidades, 2, '.', ', '), 'Subtotal ', "$ " . number_format($Subtotales, 2, '.', ', ')));
            $pdf->Row(array('', 'I.V.A.', "$ " . number_format($Subtotales * .16, 2, '.', ', ')));
            $pdf->Row(array('', 'TOTAL', "$ " . number_format($Subtotales * 1.16, 2, '.', ', ')));
        } else {
            $pdf->Row(array(number_format($Cantidades, 2, '.', ', '), 'TOTAL ', "$ " . number_format($Subtotales, 2, '.', ', ')));
        }
        /* FIN RESUMEN */
        $path = 'uploads/Reportes/OrdenDeCompra';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file_name = "Compra_" . date("dmYhis");
        $url = $path . '/' . $file_name . '.pdf';
        /* Borramos el archivo anterior */
        if (delete_files('uploads/Reportes/OrdenDeCompra/')) {
            /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
        }
        $pdf->Output($url);
        print base_url() . $url;
    }

}
