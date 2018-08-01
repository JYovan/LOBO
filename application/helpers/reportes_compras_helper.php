<?php

class PDFED extends FPDF {

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
        $this->Cell(10, 4, utf8_decode("Pares "), 0/* BORDE */, 1, 'L');
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
        $this->Cell(15, 4, utf8_decode($this->getPares()), 0/* BORDE */, 1, 'L');


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
        $anchos = array(12/* 0 */, 55/* 1 */, 10/* 2 */, 15/* 3 */, 15/* 4 */, 15/* 5 */, 20/* 6 */, 21/* 7 */, 21/* 8 */, 21/* 9 */);
        $aligns = array('L', 'L', 'L', 'C', 'R', 'R', 'R', 'R', 'R', 'R');

        $this->SetY(25);
        $this->SetX(5);
        $this->SetFont('Arial', 'B', 7);
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        $this->Row(array(
            utf8_decode('Artículo'),
            '',
            'U.M.',
            'Talla',
            utf8_decode('Explosión'),
            'Precio',
            'Subtotal',
            'Requerido',
            '1ra Entrega',
            '2da Entrega'));
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
        $this->Cell(10, 4, utf8_decode("Pares "), 0/* BORDE */, 1, 'L');
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
        $this->Cell(15, 4, utf8_decode($this->getPares()), 0/* BORDE */, 1, 'L');


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
        $this->SetFont('Arial', 'B', 7);
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        $this->Row(array(utf8_decode('Artículo'), '', 'Unidad', utf8_decode('Explosión'), 'Precio', 'Subtotal', 'Requerido', '1ra Entrega', '2da Entrega'));
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

class FPDF_COMPRAS extends FPDF {

    public $OrdenCompra = '';
    public $Proveedor = '';
    public $ConsignarA = '';
    public $Observaciones = '';
    public $Fecha = '';
    public $Borders = 0;

    function getBorders() {
        return $this->Borders;
    }

    function setBorders($Borders) {
        $this->Borders = $Borders;
    }

    function getOrdenCompra() {
        return $this->OrdenCompra;
    }

    function setOrdenCompra($OrdenCompra) {
        $this->OrdenCompra = $OrdenCompra;
    }

    function getFecha() {
        return $this->Fecha;
    }

    function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    function getProveedor() {
        return $this->Proveedor;
    }

    function setProveedor($Proveedor) {
        $this->Proveedor = $Proveedor;
    }

    function getConsignarA() {
        return $this->ConsignarA;
    }

    function getObservaciones() {
        return $this->Observaciones;
    }

    function setConsignarA($ConsignarA) {
        $this->ConsignarA = $ConsignarA;
    }

    function setObservaciones($Observaciones) {
        $this->Observaciones = $Observaciones;
    }

    function Header() {

        $this->Image('img/lsbck.png', /* LEFT */ 5, 5/* TOP */, /* ANCHO */ 30);
        $this->SetFont('Arial', 'B', 9);
        $this->SetY(5);
        $this->SetX(40);
        $this->Cell(110, 4, utf8_decode("CALZADO LOBO, S.A. DE C.V."), 0/* BORDE */, 1, 'L');
        $this->SetY(5);
        $this->SetX(165);
        $this->Cell(55, 4, utf8_decode("ACTIVA"), 1/* BORDE */, 1, 'C');
        $this->SetY(5);
        $this->SetX(225);
        $this->Cell(30, 4, utf8_decode("Orden de compra"), 1/* BORDE */, 1, 'C');
        $this->SetX(225);
        $this->Cell(30, 4, utf8_decode($this->getOrdenCompra()), 1/* BORDE */, 1, 'C');
        $this->SetX(195);
        $this->SetFont('Arial', 'B', 7.5);
        $this->Cell(25, 4, utf8_decode("Cap. " . Date('d/m/Y')), 0/* BORDE */, 1, 'L');
        $this->SetY(13);
        $this->SetX(225);
        $this->Cell(30, 4, utf8_decode("Imp. " . Date('d/m/Y h:i:s')), 0/* BORDE */, 1, 'L');
        $this->SetY(9);
        $this->SetX(40);
        $this->Cell(110, 4, utf8_decode("Rio Santiago No. 245 Col. San Miguel"), 0/* BORDE */, 1, 'L');
        $this->SetY(13);
        $this->SetX(40);
        $this->Cell(25, 4, utf8_decode("León, Gto. Tel. 1-46-46-46 al 49 E-mail compras@lobosolo.com.mx"), 0/* BORDE */, 1, 'L');
        $this->SetY(13);
        $this->SetX(165);
        $this->Cell(25, 4, utf8_decode("Ord- " . $this->getFecha()), 0/* BORDE */, 1, 'L');
        $this->SetY(20);
        $this->SetX(5);
        $this->Cell(165, 4, utf8_decode("Proveedor : " . $this->getProveedor()), 0/* BORDE */, 1, 'L');
        $this->SetY(20);
        $this->SetX(170);
        $this->Cell(105, 4, utf8_decode("Consignar a : " . $this->getConsignarA()), 0/* BORDE */, 1, 'L');
        $this->Line(5, $this->GetY(), 275, $this->GetY());
        $this->SetX(5);
        $this->Cell(270, 4, utf8_decode("Observaciones : " . $this->getObservaciones()), 0/* BORDE */, 1, 'L');
        $this->Line(5, $this->GetY(), 275, $this->GetY());

        $this->AliasNbPages('{totalPages}');
        // Go to 1.5 cm from bottom
        $this->SetY(3);
        $this->SetX(250);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 7);
        // Print centered page number
        $this->SetTextColor(0, 0, 0);
        $this->Cell(35, 3, utf8_decode('Pag. ' . $this->PageNo() . ' de {totalPages}'), 0, 0, 'R');

        /* ENCABEZADO DETALLE TITULOS */
        $anchos = array(15/* 0 */, 12/* 1 */, 103/* 2 */, 15/* 3 */, 20/* 4 */, 13/* 5 */, 19/* 6 */, 10/* 7 */, 17/* 8 */, 17/* 9 */, 29/* 10 */);
        $aligns = array('L', 'L', 'L', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C');

        $this->SetY(30);
        $this->SetX(5);
        $this->SetFont('Arial', 'B', 7);
        $this->SetWidths($anchos);
        $this->SetAligns($aligns);
        $this->Row(array(
            'Cantidad', /* 0 */
            'Un-Me', /* 1 */
            'Articulo', /* 2 */
            'Precio U.C', /* 3 */
            'Subtot', /* 4 */
            'Sem Prd', /* 5 */
            'Reg.', /* 6 */
            'Maq', /* 7 */
            'Recibido', /* 8 */
            'Docto', /* 9 */
            'Fecha de entrega'/* 10 */));
            $this->Line(5, $this->GetY(), 275, $this->GetY());
    }

    function Footer() {
        $ac = 3;
        // Go to 1.5 cm from bottom
        $this->SetY(-32.5);
        $this->SetX(5);
        // Select Arial italic 8
        $this->SetFont('Arial', 'B', 6.5);
        // Print centered page number
        $this->Cell(130, 3.5, 'IMPORTANTE', 1, 1, 'C');
        $this->SetX(5);
        $this->Cell(130, $ac, utf8_decode('1.- No se recibira ningún documento sin una copia de la orden de compra.'), 0, 1, 'L');
        $this->SetX(5);
        $this->Cell(130, $ac, utf8_decode('2.- Las cantidades en el documento deben de coincidir con la orden de compra.'), 0, 1, 'L');
        $this->SetX(5);
        $this->Cell(130, $ac, utf8_decode('3.- Solo se recibirán las parcialidades en la fecha descrita en  esta orden de compra.'), 0, 1, 'L');
        $this->SetX(5);
        $this->MultiCell(130, $ac, utf8_decode('4.- Solo en el caso de pieles y forros la cantidad a entregar podra variar más menos 500 DM2 teniendo en cuenta que el total de la misma no deberá exceder mas de los 500 DM2 mencionados.'), 0, 'L');

        $this->SetY(-26);
        $this->SetX(135);
        $this->Cell(60, $ac, utf8_decode('Recibe mercancia'), 0, 1, 'L');
        $this->SetX(135);
        $this->Cell(60, $ac, utf8_decode('Nombre, firma y fecha de confirmación pedido'), 0, 1, 'L');


        $this->SetY(-32.5);
        $this->SetX(200);
        $this->Rect(200/* X */, $this->GetY()/* Y */, 75, 17.5);
        $this->Cell(75, $ac, utf8_decode('Favor de entregar mercancia y orden de compra en almacen'), 0, 1, 'C');
        $this->SetY(-18);
        $this->SetX(200);
        $this->Cell(75, $ac, utf8_decode('Atentamente COMPRAS'), 1, 1, 'C');
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
            $this->MultiCell($w, 4, $data[$i], $this->getBorders(), $a);
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
