<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReportesDisDes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('reportes_disdes_model');
        $this->load->model('estilos_model');
        $this->load->model('combinaciones_model');
        $this->load->model('fraccionesxestilo_model');
        $this->load->model('piezasymateriales_model');
        $this->load->helper('reportes_helper');
        $this->load->helper('file');
        $this->load->helper('array');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vReportesDisDes');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->estilos_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXPiezaMaterial() {
        try {
            extract($this->input->post());
            print json_encode($this->reportes_disdes_model->getCombinacionesXPiezaMaterial($Estilo));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onImprimirFichaTecnica() {
        extract($this->input->post());
        $FichaTecnica = $this->reportes_disdes_model->getFichaTecnicaByEstiloByCombinacion($Estilo, $Combinacion);
        if (!empty($FichaTecnica)) {
            $Encabezado = $FichaTecnica[0];
//            $pdf = new PDF('P', 'mm', array(215.9/* ANCHO */, 279.4/* ALTURA */));
            $pdf = new PDF('P', 'mm', array(235, 297));
            $pdf->AliasNbPages();
            $pdf->AddPage();
            /* ENCABEZADO */
            $image = "lsbck.png";
            $pdf->Image('img/' . $image, /* LEFT */ 8, 11/* TOP */, /* ANCHO */ 35, /* ALTO */ 17.5);
            $pdf->SetAutoPageBreak(false);
            $base = 10;
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetY($base);
            $pdf->SetX(43.5);
            $pdf->Cell(110, 4, utf8_decode("CALZADO LOBO, S.A. DE C.V."), 0/* BORDE */, 1, 'L');
            $pdf->SetY($base);
            $pdf->SetX(200);
            $pdf->SetFont('Arial', 'B', 7.5);
            $pdf->Cell(100, 4, utf8_decode("Fecha. " . Date('d/m/Y')), 0/* BORDE */, 1, 'L');
            $pdf->Rect(43.5/* X */, 14/* Y */, 110/* W */, 13.5/* H */);
            $pdf->SetFont('Arial', 'B', 7);
            /* LINEA */
            $pdf->SetY(14);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Linea"), 0/* BORDE */, 0, 'L');
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetY(14);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveLinea), 0/* BORDE */, 1, 'C');
            $pdf->SetY(14);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->DescLinea), 0/* BORDE */, 1, 'L');
            /* ESTILO */
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetY(17.5);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Estilo"), 0/* BORDE */, 0, 'L');
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetY(17.5);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveEstilo), 0/* BORDE */, 1, 'C');
            $pdf->SetY(17.5);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->DescEstilo), 0/* BORDE */, 1, 'L');
            /* DESPERDICIO */
            $pdf->SetY(17.5);
            $pdf->SetX(123.5);
            $pdf->Cell(30, 4, utf8_decode("% Desperdicio " . $Encabezado->Desperdicio), 0/* BORDE */, 1, 'C');
            /* COLOR */
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetY(20.5);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Color"), 0/* BORDE */, 0, 'L');
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetY(20.5);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveCombinacion), 0/* BORDE */, 1, 'C');
            $pdf->SetY(20.5);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->DescCombinacion), 0/* BORDE */, 1, 'L');
            /* MAQUILA */
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetY(23.5);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Maq"), 0/* BORDE */, 1, 'L');
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetY(23.5);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveMaquila), 0/* BORDE */, 1, 'C');
            $pdf->SetY(23.5);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->NombreMaquila), 0/* BORDE */, 1, 'L');

            /* FIN ENCABEZADO */
            $posiciones = array(10/* 0 */, 20/* 1 */, 60/* 2 */, 85/* 3 */, 140/* 4 */, 165/* 5 */, 180/* 6 */, 195/* 7 */, 210/* 8 */);
            $anchos = array(40/* 0 */, 65/* 1 */, 20/* 2 */, 10/* 3 */, 60/* 4 */);
            /* DETALLE */
            /* DETALLE TITULOS */
            /* PIEZA */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[0]);
            $pdf->Cell($anchos[3], 4, utf8_decode("Pieza"), 0/* BORDE */, 0, 'L');
            /* DESC PIEZA */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[1]);
            $pdf->Cell($anchos[0], 4, utf8_decode(""), 0/* BORDE */, 0, 'L');
            /* ARTICULO */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[2]);
            $pdf->Cell($anchos[2], 4, utf8_decode("Artículo"), 0/* BORDE */, 0, 'L');
            /* DESC ARTICULO */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[3]);
            $pdf->Cell($anchos[4], 4, utf8_decode(""), 0/* BORDE */, 0, 'L');
            /* UNIDAD MEDIDA */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[4]);
            $pdf->Cell($anchos[3], 4, utf8_decode("U.M"), 0/* BORDE */, 0, 'L');
            /* PRECIO */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[5]);
            $pdf->Cell($anchos[2], 4, utf8_decode("Precio"), 0/* BORDE */, 0, 'L');
            /* CONSUMO */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[6]);
            $pdf->Cell($anchos[2], 4, utf8_decode("Consumo"), 0/* BORDE */, 0, 'C');
            /* COSTO */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[7]);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Costo"), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
            /* .10 */
            $pdf->SetY(29);
            $pdf->SetX($posiciones[8]);
            $pdf->Cell($anchos[2], 4, utf8_decode(utf8_decode("% " . $Encabezado->Desperdicio)), 0/* BORDE */, 1, 'C');
            $pdf->Line(/* Izq-X */10, /* Top-Y */ $pdf->GetY(), /* Largo */ 225, $pdf->GetY());
            /* FIN DETALLE TITULOS */

            /* DETALLE */
            $page_height = 287;
            $Y = $pdf->GetY();
            $YY = $pdf->GetY();
            $pdf->SetFont('Arial', 'B', 6);
            $Detalle = array();
            $Departamentos = array();
            $Familias = array();
            foreach ($FichaTecnica as $k => $v) {
                if (!in_array($v->Departamento, $Departamentos, true)) {
                    array_push($Departamentos, $v->Departamento);
                }
                if (!in_array($v->Familia, $Familias, true)) {
                    array_push($Familias, $v->Familia);
                }
            }
            /* ACUMULADORES FAMILIAS */
            $total_consumo_familia = 0.0;
            $total_costo_familia = 0.0;
            $total_desperdicio_familia = 0.0;

            /* ACUMULADORES DEPARTAMENTOS */
            $total_consumo_departamento = 0.0;
            $total_costo_departamento = 0.0;
            $total_desperdicio_departamento = 0.0;

            /* ACUMULADORES FINALES */
            $total_consumo_final = 0.0;
            $total_costo_final = 0.0;
            $total_desperdicio_final = 0.0;


            /* FOR EACH DEPARTAMENTOS */
            foreach ($Departamentos as $kd => $d) {
                /* FOR EACH FAMILIAS */
                foreach ($Familias as $kf => $f) {
                    /* FOR EACH FILAS */
                    foreach ($FichaTecnica as $row) {
                        /* VALIDAR SI TIENEN ESTABLECIDOS UN DEPARTAMENTO Y UNA FAMILIA */
                        if ($row->Departamento === $d && $row->Familia === $f) {
                            /* VALIDAR LA ALTURA ACTUAL CON LA ALTURA DEL DOCUMENTO */
                            if ($pdf->GetY() > $page_height) {
                                /* COMO YA NO EXISTE EL ENCABEZADO SE INICIA DESDE UNA NUEVA POSICION Y ALTURA */
                                $page_height = 580;
                                /* SE AGREGA UNA PÁGINA PARA EVITAR EL DUPLICADO CON SALTO AUTOMATICO */
                                $pdf->AddPage();
                            }

                            /* RESTABLECER POSICION EN Y */
                            $Y = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* FIN RESTABLECER POSICION EN Y */
                            /* COLOCAR CAMPOS */
                            /* PIEZA */
                            $pdf->SetXY($posiciones[0], $Y);
                            $pdf->MultiCell($anchos[3], 4, utf8_decode($row->ClavePieza), 0/* BORDER */, 'R'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* DESC PIEZA */
                            $pdf->SetXY($posiciones[1], $Y);
                            $pdf->MultiCell($anchos[0], 4, utf8_decode($row->DescPieza . " " . $pdf->GetY()), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* ARTICULO */
                            $pdf->SetXY($posiciones[2], $Y);
                            $pdf->MultiCell($anchos[2], 4, utf8_decode($row->ClaveMaterial), 0/* BORDER */, 'R'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* DESC ARTICULO */
                            $pdf->SetXY($posiciones[3], $Y);
                            $pdf->MultiCell($anchos[4], 4, utf8_decode($row->DescMaterial), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();

                            /* UNIDAD MEDIDA */
                            $pdf->SetXY($posiciones[4], $Y);
                            $pdf->MultiCell($anchos[3], 4, utf8_decode($row->Unidad), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* PRECIO */
                            $pdf->SetXY($posiciones[5], $Y);
                            $pdf->MultiCell($anchos[2], 4, utf8_decode("$ " . number_format($row->Precio, 3, '.', ', ')), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* CONSUMO */
                            $pdf->SetXY($posiciones[6], $Y);
                            $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($row->Consumo, 3, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* CONSUMO Y COSTO */
                            $pdf->SetXY($posiciones[7], $Y);
                            $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($row->Costo, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                            /* DESPERDICIO */
                            $pdf->SetXY($posiciones[8], $Y);
                            $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($row->UtlimaColumna, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();

                            /* ACUMULADORES */

                            /* ACUMULADORES FAMILIA */
                            $total_consumo_familia += $row->Consumo;
                            $total_costo_familia += $row->Costo;
                            $total_desperdicio_familia += $row->UtlimaColumna;
                            /* FIN ACUMULADORES FAMILIA */

                            /* ACUMULADORES DEPARTAMENTO */
                            $total_consumo_departamento += $row->Consumo;
                            $total_costo_departamento += $row->Costo;
                            $total_desperdicio_departamento += $row->UtlimaColumna;
                            /* FIN ACUMULADORES DEPARTAMENTO */

                            /* ACUMULADOR FINAL */
                            $total_consumo_final += $row->Consumo;
                            $total_costo_final += $row->Costo;
                            $total_desperdicio_final += $row->UtlimaColumna;
                            /* FIN ACUMULADORES FINAL */

                            /* FIN COLOCAR CAMPOS */
                            $pdf->SetY($YY); /* !SOLO EN CASO DE QUE LA ULTIMA CELDA SEA DE TIPO CELL ESTABLECER LA ALTURA FINAL, DE LA FILA */
                            $pdf->Line(/* Izq-X */10, /* Top-Y */ $YY, /* Largo */ 225, $YY);
                        } else if ($row->Departamento === $d && $row->Familia === null) {
                            /* REGISTROS QUE SOLO CONTIENEN DEPARTAMENTO */


                            /* VALIDAR LA ALTURA ACTUAL CON LA ALTURA DEL DOCUMENTO */
                            if ($pdf->GetY() > $page_height) {
                                /* COMO YA NO EXISTE EL ENCABEZADO SE INICIA DESDE UNA NUEVA POSICION Y ALTURA */
                                $page_height = 580;
                                /* SE AGREGA UNA PÁGINA PARA EVITAR EL DUPLICADO CON SALTO AUTOMATICO */
                                $pdf->AddPage();
                            }

                            /* ACUMULADORES */

                            /* ACUMULADORES FAMILIA */
                            $total_consumo_familia += $row->Consumo;
                            $total_costo_familia += $row->Costo;
                            $total_desperdicio_familia += $row->UtlimaColumna;
                            /* FIN ACUMULADORES FAMILIA */

                            /* ACUMULADORES DEPARTAMENTO */
                            $total_consumo_departamento += $row->Consumo;
                            $total_costo_departamento += $row->Costo;
                            ;
                            $total_desperdicio_departamento += $row->UtlimaColumna;
                            /* FIN ACUMULADORES DEPARTAMENTO */

                            /* ACUMULADOR FINAL */
                            $total_consumo_final += $row->Consumo;
                            $total_costo_final += $row->Costo;
                            $total_desperdicio_final += $row->UtlimaColumna;
                            /* FIN ACUMULADORES FINAL */

                            /* FIN ACUMULADORES */

                            /* FIN DE REGISTROS CON DEPARTAMENTO */
                        }
                    }/* FIN FOREACH FILAS */

                    /* VALIDAR QUE HAYA UN CONSUMO DENTRO DE LA FAMILIA */
                    if ($total_consumo_familia > 0) {
                        /* TOTAL DE LA FAMILIA */
                        /* TITULO DE LA FAMILIA */
                        $pdf->SetXY($posiciones[4], $YY);
                        $pdf->MultiCell(40, 4, utf8_decode("Consumo total de $f "), 0/* BORDER */, 'R'/* ALIGN */, 0/* FILL */);
                        /* FIN TITULO DE LA FAMILIA */

                        /* CONSUMO TOTAL POR FAMILIA */
                        $pdf->SetXY($posiciones[6], $YY);
                        $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_consumo_familia, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                        /* FIN CONSUMO TOTAL POR FAMILIA */

                        /* COSTO TOTAL POR FAMILIA */
                        $pdf->SetXY($posiciones[7], $YY);
                        $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_costo_familia, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                        /* FIN COSTO TOTAL POR FAMILIA */

                        /* DESPERDICIO TOTAL POR FAMILIA */
                        $pdf->SetXY($posiciones[8], $YY);
                        $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_desperdicio_familia, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                        /* FIN DESPERDICIO TOTAL POR FAMILIA */
                        /* FIN TOTAL DE LA FAMILIA */

                        /* EVALUAR YY */
                        $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();

                        /* REINICIAR FAMILIAS ACUMULADORES EN ZEROS */
                        $total_consumo_familia = 0.0;
                        $total_costo_familia = 0.0;
                        $total_desperdicio_familia = 0.0;
                        /* FIN REINICIAR FAMILIAS ACUMULADORES EN ZEROS */
                    }
                    /* FIN VALIDAR QUE HAYA UN CONSUMO DENTRO DE LA FAMILIA */
                }/* FIN FOREACH FAMILIA */

                /* ENCERRAR SUBTOTALES POR DEPARTAMENTO */
                $pdf->Rect($posiciones[4]/* X */, $YY/* Y */, 90/* W */, 4/* H */);
                /* FIN ENCERRAR SUBTOTALES POR DEPARTAMENTO */

                /* TOTAL DEL DEPARTAMENTO */
                $pdf->SetXY($posiciones[4], $YY);
                $pdf->MultiCell(40, 4, utf8_decode("Total del departamento $d "), 0/* BORDER */, 'R'/* ALIGN */, 0/* FILL */);

                /* TOTAL CONSUMO POR DEPARTAMENTO */
                $pdf->SetXY($posiciones[6], $YY);
                $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_consumo_departamento, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                /* FIN TOTAL CONSUMO POR DEPARTAMENTO */

                /* TOTAL COSTO POR DEPARTAMENTO */
                $pdf->SetXY($posiciones[7], $YY);
                $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_costo_departamento, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                /* FIN TOTAL COSTO POR DEPARTAMENTO */

                /* TOTAL DESPERDICIO POR DEPARTAMENTO */
                $pdf->SetXY($posiciones[8], $YY);
                $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_desperdicio_departamento, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                /* FIN TOTAL DESPERDICIO POR DEPARTAMENTO */

                /* FIN TOTAL DEL DEPARTAMENTO */

                /* REINICIAR DEPARTAMENTOS ACUMULADORES EN ZEROS */
                $total_consumo_departamento = 0.0;
                $total_costo_departamento = 0.0;
                $total_desperdicio_departamento = 0.0;
                /* FIN REINICIAR DEPARTAMENTOS ACUMULADORES EN ZEROS */
            }/* FIN FOREACH DEPARTAMENTOS */
            /* FIN DETALLE */


            /* TOTAL FINAL */

            /* ENCERRAR TOTALES POR ESTILO */
            $pdf->Rect($posiciones[4]/* X */, $YY/* Y */, 90/* W */, 4/* H */);
            /* FIN ENCERRAR TOTALES POR ESTILO */

            $pdf->SetXY($posiciones[0], $YY);
            $pdf->MultiCell($anchos[4]-10, 4, utf8_decode("Mano de obra"), 1/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
            $pdf->SetXY($posiciones[4], $YY);
            $pdf->MultiCell(40, 4, utf8_decode("Total de materiales de este estilo"), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);

            /* TOTAL FINAL CONSUMO */
            $pdf->SetXY($posiciones[6], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_consumo_final, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
            /* FIN TOTAL FINAL CONSUMO */

            /* TOTAL FINAL COSTO */
            $pdf->SetXY($posiciones[7], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_costo_final, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
            /* FIN TOTAL FINAL COSTO */

            /* TOTAL FINAL DESPERDICIO */
            $pdf->SetXY($posiciones[8], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($total_desperdicio_final, 2, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
            /* FIN TOTAL FINAL DESPERDICIO */

            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();


            /* REINICIAR ACUMULADOR FINAL */
            $total_consumo_final = 0;
            $total_costo_final = 0;
            $total_desperdicio_final = 0;
            /* FIN REINICIAR ACUMULADORES FINAL */

            /* FIN TOTAL FINAL */


            /* RESUMEN */

            /* ENCERRAR RESUMEN */
            $pdf->Rect($posiciones[0]/* X */, $YY/* Y */, 220/* W */, 24/* H */);

            $pdf->SetXY($posiciones[0], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Corte"), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();/*SALTO EN MULTICELL*/
            $pdf->Line(/* Izq-X */10, /* Top-Y */ $YY, /* Largo */ $anchos[4], $YY);
            $pdf->SetXY($posiciones[0], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Pespunte"), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();/*SALTO EN MULTICELL*/
            $pdf->Line(/* Izq-X */10, /* Top-Y */ $YY, /* Largo */ $anchos[4], $YY);
            $pdf->SetXY($posiciones[0], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Tejido"), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();/*SALTO EN MULTICELL*/
            $pdf->Line(/* Izq-X */10, /* Top-Y */ $YY, /* Largo */ $anchos[4], $YY);
            $pdf->SetXY($posiciones[0], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Montado"), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();/*SALTO EN MULTICELL*/
            $pdf->Line(/* Izq-X */10, /* Top-Y */ $YY, /* Largo */ $anchos[4], $YY);
            $pdf->SetXY($posiciones[0], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Adorno"), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();/*SALTO EN MULTICELL*/
            $pdf->Line(/* Izq-X */10, /* Top-Y */ $YY, /* Largo */ $anchos[4], $YY);
            $pdf->SetXY($posiciones[0], $YY);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Total M.O."), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
            
            
            
            
            $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
            /* FIN ENCERRAR RESUMEN */

            /* FIN RESUMEN */


            $path = 'uploads/Reportes/FichasTecnicas';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "FICHA TECNICA " . $Encabezado->ClaveEstilo . " " . date("Y-m-d His");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/FichasTecnicas/')) {
                
            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
