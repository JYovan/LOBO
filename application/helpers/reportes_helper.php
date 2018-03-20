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
        
    }

}