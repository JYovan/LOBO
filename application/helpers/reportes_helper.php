<?php

class PDF extends FPDF {

    function Header() {
        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(5);
        $this->SetX(200);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 7);
        // Print centered page number 
        $this->SetTextColor(0, 0, 0);
        $this->Cell(35, 5, utf8_decode('PÁGINA ' . $this->PageNo() . ' DE {totalPages}'), 0, 0, 'R');
    }

    function Footer() { 
        $this->SetY(-15); 
        $this->SetFont('Arial', 'I', 11);
        
        $this->SetX(12);
        $this->Cell(60, 12, 'CALZADO LOBO SOLO S.A.DE C.V', 0/* BORDE */, 0/* FILL */, 'C');
        $this->SetX(12);
        $this->Line(/* Izq-X */10, /* Top-Y */ $this->GetY(), /* Largo */ 72, $this->GetY());
        
        $this->SetFont('Arial', 'I', 14);
        $this->SetX(87.5);
        $this->Cell(60, 12, 'Gerente Administrativo', 0/* BORDE */, 0/* FILL */, 'C'); 
        $this->Line(/* Izq-X */87.5, /* Top-Y */ $this->GetY(), /* Largo */ 147.5, $this->GetY());
        
        $this->SetX(162.5);
        $this->Cell(60, 12, utf8_decode('Autorización'), 0/* BORDE */, 0/* FILL */, 'C'); 
        $this->Line(/* Izq-X */162.5, /* Top-Y */ $this->GetY(), /* Largo */ 223, $this->GetY());
    }
}