<?php

class PDF extends FPDF {

    public $dMaquila = '';
    public $aMaquila = '';
    public $dSemana = '';
    public $aSemana = '';
    public $Tipo = '';
    public $Pares = '';

    public function setdMaquila($dMaquila) {
        $this->$dMaquila = $dMaquila;
    }

    public function getdMaquila() {
        return $this->dMaquila;
    }

    public function setaMaquila($aMaquila) {
        $this->$aMaquila = $aMaquila;
    }

    public function getaMaquila() {
        return $this->aMaquila;
    }

    public function setdSemana($dSemana) {
        $this->$dSemana = $dSemana;
    }

    public function getdSemana() {
        return $this->dSemana;
    }

    public function setaSemana($aSemana) {
        $this->$aSemana = $aSemana;
    }

    public function getaSemana() {
        return $this->aSemana;
    }

    public function setTipo($Tipo) {
        $this->$Tipo = $Tipo;
    }

    public function getTipo() {
        return $this->Tipo;
    }

    public function setPares($Pares) {
        $this->$Pares = $Pares;
    }

    public function getPares() {
        return $this->Pares;
    }

    function Header() {

        $this->Image('img/lsbck.png', /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Arial', 'B', 9);
        $this->SetY(5);
        $this->SetX(40);
        $this->Cell(110, 4, utf8_decode("CALZADO LOBO, S.A. DE C.V."), 0/* BORDE */, 1, 'L');
        $this->SetY(5);
        $this->SetX(170);
        $this->SetFont('Arial', 'B', 7.5);
        $this->Cell(100, 4, utf8_decode("Fecha. " . Date('d/m/Y')), 0/* BORDE */, 1, 'L');
        $this->SetY(9);
        $this->SetX(40);
        $this->Cell(110, 4, utf8_decode("Explosión de materiales de la semana: "), 0/* BORDE */, 1, 'L');
        $this->SetY(9);
        $this->SetX(100);
        $this->Cell(50, 4, utf8_decode("a la semana "), 0/* BORDE */, 1, 'L');
        $this->SetY(13);
        $this->SetX(65);
        $this->Cell(25, 4, utf8_decode("Del maquilador: "), 0/* BORDE */, 1, 'R');
        $this->SetY(13);
        $this->SetX(100);
        $this->Cell(50, 4, utf8_decode("al maquilador "), 0/* BORDE */, 1, 'L');
        $this->SetY(13);
        $this->SetX(170);
        $this->Cell(50, 4, utf8_decode("Pares "), 0/* BORDE */, 1, 'L');
        $this->SetY(17);
        $this->SetX(65);
        $this->Cell(25, 4, utf8_decode("Tipo explosión: "), 0/* BORDE */, 1, 'R');

        /* Filtros */
        $this->SetY(9);
        $this->SetX(82);
        $this->Cell(25, 4, utf8_decode($this->getdSemana()), 0/* BORDE */, 1, 'C');
        $this->SetY(13);
        $this->SetX(82);
        $this->Cell(25, 4, utf8_decode($this->getdMaquila()), 0/* BORDE */, 1, 'C');

        $this->SetY(9);
        $this->SetX(115);
        $this->Cell(25, 4, utf8_decode($this->getaSemana()), 0/* BORDE */, 1, 'C');
        $this->SetY(13);
        $this->SetX(115);
        $this->Cell(25, 4, utf8_decode($this->getaMaquila()), 0/* BORDE */, 1, 'C');
        
        $this->SetY(13);
        $this->SetX(180);
        $this->Cell(25, 4, utf8_decode($this->getPares()), 0/* BORDE */, 1, 'C');


        $this->SetY(17);
        $this->SetX(100);
        $this->Cell(25, 4, utf8_decode($this->getTipo()), 0/* BORDE */, 1, 'C');


        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(3);
        $this->SetX(190);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 7);
        // Print centered page number
        $this->SetTextColor(0, 0, 0);
        $this->Cell(35, 3, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0, 0, 'R');

        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(15/* 0 */, 65/* 1 */, 15/* 2 */, 15/* 3 */, 15/* 4 */, 20/* 5 */, 20/* 6 */, 20/* 7 */, 20/* 8 */);
        $aligns = array('L', 'L', 'L', 'L', 'L', 'L', 'L', 'L');

        $this->SetY(25);
        $this->SetX(5);
        $this->SetFont('Arial', 'B', 7.5);
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        $this->Row(array(utf8_decode('Artículo'), '', 'Unidad', utf8_decode('Explosión'), 'Precio', 'Subtotal', 'Requerido', '1ra Entrega', '1da Entrega'));
    }

    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 4 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Se pone para que depues de insertar una pagina establezca la posicion en X = 5
        $this->SetX(5);

        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //$this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 4, $data[$i], 'B', $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

}
