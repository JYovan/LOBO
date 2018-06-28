<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReportesCompras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('compras_model');
        $this->load->helper('reportes_compras_helper');
        $this->load->helper('file');
        $this->load->helper('array');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vReporteExplosion');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function onImprimirExplosion() {
        extract($this->input->post());
        $Explocion = $this->compras_model->getExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano);
        $Familias = $this->compras_model->getFamiliasExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano);
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


            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 10);
            $GranTotal = 0;
            $GranTotalExplosion = 0;
            $GranGranTotal = 0;
            $GranGranTotalExplosion = 0;
            /* GRUPO */
            foreach ($Familias as $key => $F) {
                $pdf->SetX(12);
                $pdf->SetFont('Arial', 'B', 7.);
                $pdf->Cell(50, 5, utf8_decode($F->Familia), 0/* BORDE */, 1, 'L');

                /* ENCABEZADO DETALLE  */
                foreach ($Explocion as $key => $value) {
                    if ($value->Familia == $F->Familia) {
                        $pdf->SetTextColor(0, 0, 0);
                        $pdf->SetFont('Arial', '', 6.5);
                        $pdf->Row(array(
                            utf8_decode($value->ClaveArticulo),
                            utf8_decode($value->Articulo),
                            utf8_decode($value->Unidad),
                            utf8_decode($value->Explosion),
                            "$ " . number_format($value->Precio, 2),
                            "$ " . number_format($value->Subtotal, 2),
                            '',
                            '',
                            ''));
                        $GranTotal += $value->Subtotal;
                        $GranTotalExplosion += $value->Explosion;
                    }
                }
                $pdf->SetX(5);
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->Row(array(
                    '',
                    'Totales por grupo',
                    '',
                    $GranTotalExplosion,
                    '',
                    "$ " . number_format($GranTotal, 2),
                    '',
                    '',
                    ''));
                $GranTotal += $value->Subtotal;
                $GranGranTotal += $GranTotal;
                $GranGranTotalExplosion += $GranTotalExplosion;
            }
            $pdf->SetX(5);
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Row(array(
                '',
                'Totales por sem  y maquila',
                '',
                $GranGranTotalExplosion,
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
            $file_name = "EXPLOSION DE MATERIALES" . date("Y-m-d His");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Compras/')) {

            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
