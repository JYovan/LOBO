<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReportesCompras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('compras_model')->helper('reportes_compras_helper')->helper('file')->helper('array');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vReporteExplosion')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onImprimirExplosionDesglosada() {
        extract($this->input->post());
        $cm = $this->compras_model;
        //CREA TABLA TEMPORAL PARA REALIZAR EXPLOSIÓN
        $cm->getExplosionDesglosadaBySem($dSemana, $aSemana, $dMaquila, $aMaquila, $Ano);
        $Familias = $cm->getFamiliasExplosionDesglosada();
        $Cabeceros = $cm->getCabecerosExplosionDesglosada();
        $Explocion = $cm->getArticulosExplosionDesglosada();
        $pares = $cm->getParesTotales($dSemana, $aSemana, $dMaquila, $aMaquila, $Ano)[0]->PARES;
        if (!empty($Familias)) {
            $Encabezado = $Familias[0];
            $pdf = new PDFED('P', 'mm', array(215.9, 279.4));

            /* Tipo Explosion */
            switch ($TipoE) {
                case '4':
                    $Tipo = '******* SUELA *******';
                    break;
            }
            $pdf->dMaquila = $dMaquila;
            $pdf->aMaquila = $aMaquila;
            $pdf->dSemana = $dSemana;
            $pdf->aSemana = $aSemana;
            $pdf->Tipo = $Tipo;
            $pdf->Pares = $pares;
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);

            $TotalFamilias = 0;
            $TotalEFamilias = 0;
            $TotalMaterial = 0;
            $TotalEMaterial = 0;
            $TotalGeneral = 0;
            $TotalEGeneral = 0;
            foreach ($Familias as $key => $F) {
                $pdf->SetX(12);
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->Cell(50, 5, utf8_decode($F->Familia), 0/* BORDE */, 1, 'L');

                foreach ($Cabeceros as $key => $C) {

                    if ($F->IdFamilia === $C->IdFamilia) {
                        foreach ($Explocion as $key => $A) {
                            if ($A->Cabecera === $C->IdCabecera) {
                                $pdf->SetFont('Arial', '', 6.5);
                                $anchos = array(12/* 0 */, 55/* 1 */, 10/* 2 */, 15/* 3 */, 15/* 4 */, 15/* 5 */, 20/* 6 */, 21/* 7 */, 21/* 8 */, 21/* 9 */);
                                $aligns = array('L', 'L', 'L', 'C', 'R', 'R', 'R', 'R', 'R', 'R');
                                $pdf->SetAligns($aligns);
                                $pdf->SetWidths($anchos);
                                $pdf->SetAligns($aligns);
                                $pdf->Row(array(
                                    utf8_decode($C->Material),
                                    utf8_decode($C->Descripcion),
                                    utf8_decode($A->Unidad),
                                    utf8_decode(number_format($A->Talla, 1, '.', ', ')),
                                    utf8_decode(number_format($A->Explosion, 1, '.', ', ')),
                                    "$ " . number_format($A->PrecioLista, 2, '.', ', '),
                                    "$ " . number_format($A->Subtotal, 2, '.', ', '),
                                    '', '', ''));

                                $TotalMaterial += $A->Subtotal;
                                $TotalEMaterial += $A->Explosion;
                            }
                        }
                        $pdf->SetX(5);
                        $pdf->SetFont('Arial', 'B', 6.5);
                        $anchos = array(40/* 0 */, 40/* 1 */, 2/* 2 */, 10/* 3 */, 15/* 4 */, 15/* 5 */, 20/* 6 */, 21/* 7 */, 21/* 8 */, 21/* 9 */);
                        $aligns = array('L', 'L', 'L', 'C', 'R', 'R', 'R', 'R', 'R', 'R');
                        $pdf->SetAligns($aligns);
                        $pdf->SetWidths($anchos);
                        $pdf->Row(array(
                            '',
                            'Totales por MATERIAL:',
                            '',
                            '',
                            number_format($TotalEMaterial, 2, '.', ', '),
                            '',
                            "$ " . number_format($TotalMaterial, 2, '.', ', '),
                            '',
                            '',
                            ''));

                        $TotalEFamilias += $TotalEMaterial;
                        $TotalFamilias += $TotalMaterial;
                    }
                }
                $pdf->SetX(5);
                $pdf->SetFont('Arial', 'B', 6.5);
                $anchos = array(40/* 0 */, 40/* 1 */, 2/* 2 */, 10/* 3 */, 15/* 4 */, 15/* 5 */, 20/* 6 */, 21/* 7 */, 21/* 8 */, 21/* 9 */);
                $aligns = array('L', 'L', 'L', 'C', 'R', 'R', 'R', 'R', 'R', 'R');
                $pdf->SetAligns($aligns);
                $pdf->SetWidths($anchos);
                $pdf->Row(array(
                    '',
                    'Totales por GRUPO:',
                    '',
                    '',
                    number_format($TotalEFamilias, 2, '.', ', '),
                    '',
                    "$ " . number_format($TotalFamilias, 2, '.', ', '),
                    '',
                    '',
                    ''));

                $TotalEGeneral += $TotalEFamilias;
                $TotalGeneral += $TotalFamilias;
                $TotalFamilias = 0;
                $TotalEFamilias = 0;
            }
            $pdf->SetX(5);
            $pdf->SetFont('Arial', 'B', 6.5);
            $anchos = array(40/* 0 */, 40/* 1 */, 2/* 2 */, 10/* 3 */, 15/* 4 */, 15/* 5 */, 20/* 6 */, 21/* 7 */, 21/* 8 */, 21/* 9 */);
            $aligns = array('L', 'L', 'L', 'C', 'R', 'R', 'R', 'R', 'R', 'R');
            $pdf->SetAligns($aligns);
            $pdf->SetWidths($anchos);
            $pdf->Row(array(
                '',
                'Totales por SEMANA MAQUILA:',
                '',
                '',
                number_format($TotalEGeneral, 2, '.', ', '),
                '',
                "$ " . number_format($TotalGeneral, 2, '.', ', '),
                '',
                '',
                ''));



            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Compras';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "EXPLOSION DE MATERIALES DESGLOSADA" . date("dmYhis");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Compras/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onImprimirExplosion() {
        extract($this->input->post());
        $cm = $this->compras_model;

        $pares = $cm->getParesTotales($dSemana, $aSemana, $dMaquila, $aMaquila, $Ano)[0]->PARES;
        $Explocion = $cm->getExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano);
        $Familias = $cm->getFamiliasExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano);
        if (!empty($Explocion)) {
            $Encabezado = $Explocion[0];
            $pdf = new PDF('P', 'mm', array(215.9, 279.4));

            /* Tipo Explosion */
            switch ($TipoE) {
                case '1':
                    $Tipo = '******* PIEL Y FORRO *******';
                    break;
                case '2':
                    $Tipo = '******* SUELA *******';
                    break;
                case '3':
                    $Tipo = '******* INDIRECTOS *******';
                    break;
            }

            $pdf->dMaquila = $dMaquila;
            $pdf->aMaquila = $aMaquila;
            $pdf->dSemana = $dSemana;
            $pdf->aSemana = $aSemana;
            $pdf->Tipo = $Tipo;
            $pdf->Pares = $pares;
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);
            $GranTotal = 0;
            $GranTotalExplosion = 0;
            $GranGranTotal = 0;
            $GranGranTotalExplosion = 0;
            /* GRUPO */

            /* ARTICULOS */
            $articulos = array();
            /* ARTICULOS X */
            $articulosx = array();
            foreach ($Familias as $key => $f) {
                foreach ($Explocion as $key => $v) {
                    if ($v->Familia == $f->Familia) {
                        if (!in_array($v->Articulo, $articulosx, true)) {
                            array_push($articulosx, $v->Articulo);
                            $articulo["CLAVE"] = $v->ClaveArticulo;
                            $articulo["FAMILIA"] = $v->Familia;
                            $articulo["ARTICULO"] = $v->Articulo;
                            $articulo["UNIDAD"] = $v->Unidad;
                            $articulo["EXPLOSION"] = $v->Explosion;
                            $articulo["PRECIO"] = $v->Precio;
                            $articulo["SUBTOTAL"] = $v->Subtotal;
                            array_push($articulos, $articulo);
                        } else {
                            /* SI ENCUENTRA EL ARTICULO SUMAR EL SUBTOTAL */
                            foreach ($articulos as $k => $vv) {
                                if ($vv["CLAVE"] === $v->ClaveArticulo) {
                                    $articulos[$k]["EXPLOSION"] = $vv["EXPLOSION"] + $v->Explosion;
                                    $articulos[$k]["SUBTOTAL"] = $vv["SUBTOTAL"] + $v->Subtotal;
                                }
                            }
                        }
                    }
                }
            }
            foreach ($Familias as $key => $F) {
                $pdf->SetX(12);
                $pdf->SetFont('Arial', 'B', 7.);
                $pdf->Cell(50, 5, utf8_decode($F->Familia), 0/* BORDE */, 1, 'L');
                /* ENCABEZADO DETALLE  */
                $GranTotal = 0;
                $GranTotalExplosion = 0;
                foreach ($articulos as $key => $v) {
                    if ($v["FAMILIA"] == $F->Familia) {
                        $pdf->SetTextColor(0, 0, 0);
                        $pdf->SetFont('Arial', '', 6.5);
                        $pdf->Row(array(
                            utf8_decode($v["CLAVE"]),
                            utf8_decode($v["ARTICULO"]),
                            utf8_decode($v["UNIDAD"]),
                            utf8_decode(number_format($v["EXPLOSION"], 1, '.', ', ')),
                            "$ " . number_format($v["PRECIO"], 2, '.', ', '),
                            "$ " . number_format($v["SUBTOTAL"], 2, '.', ', '),
                            '', '', ''));
                        $GranTotal += $v["SUBTOTAL"];
                        $GranTotalExplosion += $v["EXPLOSION"];
                        $GranGranTotal += $v["SUBTOTAL"];
                        $GranGranTotalExplosion += $v["EXPLOSION"];
                    }
                }
                $pdf->SetX(5);
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->Row(array(
                    '',
                    'Totales por grupo',
                    '',
                    number_format($GranTotalExplosion, 2, '.', ', '),
                    '',
                    "$ " . number_format($GranTotal, 2, '.', ', '),
                    '',
                    'Costo', "$ " . number_format($GranTotal / $pares, 2, '.', ', ')));
                $GranTotal += $v["SUBTOTAL"];
            }
            $pdf->SetX(5);
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Row(array(
                '',
                'Totales por sem  y maquila',
                '',
                number_format($GranGranTotalExplosion, 3, '.', ', '),
                '',
                "$ " . number_format($GranGranTotal, 2),
                '',
                '',
                ''));

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Compras';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "EXPLOSION DE MATERIALES" . date("dmYhis");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Compras/')) {
                /* ELIMINA LA EXISTENCIA DE CUALQUIER ARCHIVO EN EL DIRECTORIO */
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
