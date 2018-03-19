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

    public function getCombinaciones() {
        try {
            print json_encode($this->combinaciones_model->getCombinaciones());
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
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetY($base);
            $pdf->SetX(43.5);
            $pdf->Cell(110, 4, utf8_decode("CALZADO LOBO, S.A. DE C.V."), 1/* BORDE */, 1, 'L');
            $pdf->SetY($base);
            $pdf->SetX(190);
            $pdf->Cell(100, 4, utf8_decode("Fecha. " . Date('d/m/Y')), 0/* BORDE */, 1, 'L');
            $pdf->Rect(43.5/* X */, 14/* Y */, 110/* W */, 16/* H */);
            $pdf->SetFont('Arial', 'B', 9);
            /* LINEA */
            $pdf->SetY(14);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Linea"), 1/* BORDE */, 1, 'L');
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetY(14);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveLinea), 1/* BORDE */, 1, 'C');
            $pdf->SetY(14);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->DescLinea), 1/* BORDE */, 1, 'L');
            /* ESTILO */
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetY(18);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Estilo"), 1/* BORDE */, 1, 'L');
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetY(18);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveEstilo), 1/* BORDE */, 1, 'C');
            $pdf->SetY(18);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->DescEstilo), 1/* BORDE */, 1, 'L');
            /* DESPERDICIO */
            $pdf->SetY(18);
            $pdf->SetX(123.5);
            $pdf->Cell(30, 4, utf8_decode("% Desperdicio .10"), 1/* BORDE */, 1, 'C');
            /* COLOR */
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetY(22);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Color"), 1/* BORDE */, 1, 'L');
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetY(22);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveCombinacion), 1/* BORDE */, 1, 'C');
            $pdf->SetY(22);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->DescCombinacion), 1/* BORDE */, 1, 'L');
            /* MAQUILA */
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetY(26);
            $pdf->SetX(43.5);
            $pdf->Cell(12, 4, utf8_decode("Maq"), 1/* BORDE */, 1, 'L');
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetY(26);
            $pdf->SetX(55.5);
            $pdf->Cell(20, 4, utf8_decode($Encabezado->ClaveMaquila), 1/* BORDE */, 1, 'C');
            $pdf->SetY(26);
            $pdf->SetX(75.5);
            $pdf->Cell(48, 4, utf8_decode($Encabezado->NombreMaquila), 1/* BORDE */, 1, 'L');

            /* FIN ENCABEZADO */
            $posiciones = array(10/* 0 */, 60/* 1 */, 125/* 2 */, 145/* 3 */, 165/* 5 */, 185/* 6 */, 205/* 7 */);
            $anchos = array(50/* 0 */, 65/* 1 */, 20/* 2 */);
            /* DETALLE */
            /* DETALLE TITULOS */
            /* PIEZA */
            $pdf->SetY(32);
            $pdf->SetX($posiciones[0]);
            $pdf->Cell($anchos[0], 4, utf8_decode("Pieza"), 0/* BORDE */, 0, 'L');
            /* ARTICULO */
            $pdf->SetY(32);
            $pdf->SetX($posiciones[1]);
            $pdf->Cell($anchos[1], 4, utf8_decode("Artículo"), 0/* BORDE */, 0, 'L');
            /* UNIDAD MEDIDA */
            $pdf->SetY(32);
            $pdf->SetX($posiciones[2]);
            $pdf->Cell($anchos[2], 4, utf8_decode("U.M"), 0/* BORDE */, 0, 'C');
            /* PRECIO */
            $pdf->SetY(32);
            $pdf->SetX($posiciones[3]);
            $pdf->Cell($anchos[2], 4, utf8_decode("Precio"), 0/* BORDE */, 0, 'C');
            /* CONSUMO */
            $pdf->SetY(32);
            $pdf->SetX($posiciones[4]);
            $pdf->Cell($anchos[2], 4, utf8_decode("Consumo"), 0/* BORDE */, 0, 'C');
            /* CONSUMO */
            $pdf->SetY(32 - 4);
            $pdf->SetX($posiciones[5]);
            $pdf->MultiCell($anchos[2], 4, utf8_decode("Consumo y costo"), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
            /* .10 */
            $pdf->SetY(32);
            $pdf->SetX($posiciones[6]);
            $pdf->Cell($anchos[2], 4, utf8_decode(".10"), 0/* BORDE */, 1, 'C');
            $pdf->Line(/* Izq-X */10, /* Top-Y */ $pdf->GetY(), /* Largo */ 225, $pdf->GetY());
            /* FIN DETALLE TITULOS */

            /* DETALLE */
            $page_height = 287;
            $Y = $pdf->GetY();
            $YY = $pdf->GetY();
            $pdf->SetFont('Arial', 'B', 8);
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
            
            /* COMPROBAR SI EL INDEX EXISTE */
            foreach ($FichaTecnica as $k => $v) {
                if (isset($v->Departamento, $Detalle) ) {
                    $Detalle[$v->Departamento] =  $v->Familia;
                }
            }
            print_r($Detalle);
            foreach ($FichaTecnica as $row) {
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
                $pdf->MultiCell($anchos[0], 4, utf8_decode($row->ClavePieza . ' ' . $row->DescPieza . ' D :' . $row->Departamento . ' F :' . $row->Familia), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                /* ARTICULO */
                $pdf->SetXY($posiciones[1], $Y);
                $pdf->MultiCell($anchos[1], 4, utf8_decode($row->ClaveMaterial . ' ' . $row->DescMaterial), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();

                /* UNIDAD MEDIDA */
                $pdf->SetXY($posiciones[2], $Y);
                $pdf->MultiCell($anchos[2], 4, utf8_decode($row->Unidad), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                /* PRECIO */
                $pdf->SetXY($posiciones[3], $Y);
                $pdf->MultiCell($anchos[2], 4, utf8_decode("$ " . number_format($row->Precio, 4, '.', ', ')), 0/* BORDER */, 'L'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                /* CONSUMO */
                $pdf->SetXY($posiciones[4], $Y);
                $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($row->Consumo, 4, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                /* CONSUMO Y COSTO */
                $pdf->SetXY($posiciones[5], $Y);
                $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format(0, 4, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();
                /* .10 */
                $pdf->SetXY($posiciones[6], $Y);
                $pdf->MultiCell($anchos[2], 4, utf8_decode(number_format($row->Desperdicio, 4, '.', ', ')), 0/* BORDER */, 'C'/* ALIGN */, 0/* FILL */);
                $YY = ($YY > $pdf->GetY()) ? $YY : $pdf->GetY();

                /* FIN COLOCAR CAMPOS */
//                  $pdf->SetY($YY); /*!SOLO EN CASO DE QUE LA ULTIMA CELDA SEA DE TIPO CELL ESTABLECER LA ALTURA FINAL, DE LA FILA */
                $pdf->Line(/* Izq-X */12, /* Top-Y */ $YY, /* Largo */ 225, $YY);
            }
            /* FIN DETALLE */

            /* FIN CUERPO */
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
