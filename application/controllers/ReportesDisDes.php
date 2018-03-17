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
        $fichaTecnica = $this->reportes_disdes_model->getFichaTecnicaByEstiloByCombinacion($Estilo, $Combinacion);
        if (!empty($fichaTecnica)) {
         $datosEncabezado = $fichaTecnica[0];
        // Creación del objeto de la clase heredada
        $pdf = new PDF('P', 'mm', array(215.9/* ANCHO */, 279.4/* ALTURA */));


        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(true, 10);

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetY(10);
        $pdf->SetX(10);
        $pdf->Cell(50, 5, utf8_decode("FICHA TECNICA " . $datosEncabezado->ClaveLinea), 0, 1, 'L');
        
        $pdf->SetY(30);
        $pdf->SetX(30);
        $pdf->Cell(50, 5, utf8_decode("Estiloi " . $datosEncabezado->DescLinea), 0, 1, 'L');
        



        /* FIN CUERPO */
        $path = 'uploads/Reportes/FichasTecnicas';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
         $file_name = "FICHA TECNICA " . $datosEncabezado->ClaveEstilo . " " . date("Y-m-d His");
        $url = $path . '/' . $file_name . '.pdf';
        /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/FichasTecnicas/')) {
                
            }
        $pdf->Output($url);
        print base_url() . $url;
         }
    }

}
