<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class basic_report {

    public function ImprimirPedido() {
        try {
            $pdf = new FPDF();
            $pdf->AddPage();
            $image = "lsbck.png";
            $pdf->Image('img/' . $image, /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 35, /* ALTO */ 17.5);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->SetX(10);
            $pdf->Cell(20/* ANCHO */, 10/* ALTO */, 'TITULO'/* CONTENIDO */, 1/* BORDE */, 1/* SALTO LN */, 'C'/* ALINEACION */,false/*RELLENO*/);
            
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
