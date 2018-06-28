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
        $Grupos = $this->compras_model->getFamiliasExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano);
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
            /* ENCABEZADO */


            /* ENCABEZADO DETALLE TITULOS */
            $anchos = array(15/* 0 */, 70/* 1 */, 15/* 2 */, 15/* 3 */, 15/* 4 */, 15/* 5 */, 20/* 6 */, 20/* 7 */, 20/* 8 */);
            $aligns = array('L', 'L', 'L', 'L', 'L', 'L', 'L', 'L');



            foreach ($Explocion as $key => $value) {
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
            }

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
