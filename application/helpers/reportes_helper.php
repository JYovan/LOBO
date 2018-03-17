<?php

class PDF extends FPDF { 
    function Footer() {
        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number 
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, utf8_decode('PÁGINA ' . $this->PageNo() . ' DE {totalPages}'), 0, 0, 'C');
    }

}