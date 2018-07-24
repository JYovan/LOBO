<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class reportes_compras_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /* Explosiones desglosadas */

    public function getExplosionDesglosadaBySem($dSem, $aSem, $dMaq, $aMaq, $ano) {
        try {
            $sql = "EXEC sz_sp_ObtenerExplosionDetallada " . $dSem . ", " . $aSem . "," . $dMaq . "," . $aMaq . "," . $ano . " ";
            $query = $this->db->query($sql);
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFamiliasExplosionDesglosada() {
        try {
            $sql = "SELECT CONVERT (VARCHAR(10),FAM.IValue) +' '+ FAM.SValue AS Familia, MAT.Familia AS IdFamilia
FROM sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Suela
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
GROUP BY FAM.IValue, FAM.SValue, MAT.Familia

UNION

SELECT  CONVERT (VARCHAR(10),FAM.IValue) +' '+ FAM.SValue AS Familia, MAT.Familia AS IdFamilia
FROM sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Entresuela
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
GROUP BY FAM.IValue, FAM.SValue, MAT.Familia

UNION

SELECT  CONVERT (VARCHAR(10),FAM.IValue) +' '+ FAM.SValue AS Familia, MAT.Familia AS IdFamilia
FROM sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Plantilla
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
GROUP BY FAM.IValue, FAM.SValue, MAT.Familia



ORDER BY Familia

";
            $query = $this->db->query($sql);
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCabecerosExplosionDesglosada() {
        try {
            $sql = "SELECT
MAT_CAB.ID AS IdCabecera,
MAT_CAB.Material,
MAT_CAB.Descripcion,
FAM.IValue,
FAM.SValue,
MAT.Familia AS IdFamilia
FROM sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Suela
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
INNER JOIN sz_Catalogos UN ON UN.ID = MAT.UnidadCompra
INNER JOIN sz_Materiales MAT_CAB ON MAT_CAB.ID = MAT.Cabecera
GROUP BY
MAT_CAB.ID,
MAT_CAB.Material,
MAT_CAB.Descripcion,
FAM.IValue,
FAM.SValue,
MAT.Familia

UNION

SELECT
MAT_CAB.ID AS IdCabecera,
MAT_CAB.Material,
MAT_CAB.Descripcion,
FAM.IValue,
FAM.SValue,
MAT.Familia AS IdFamilia
FROM sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Entresuela
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
INNER JOIN sz_Catalogos UN ON UN.ID = MAT.UnidadCompra
INNER JOIN sz_Materiales MAT_CAB ON MAT_CAB.ID = MAT.Cabecera
GROUP BY
MAT_CAB.ID,
MAT_CAB.Material,
MAT_CAB.Descripcion,
FAM.IValue,
FAM.SValue,
MAT.Familia

UNION

SELECT
MAT_CAB.ID AS IdCabecera,
MAT_CAB.Material,
MAT_CAB.Descripcion,
FAM.IValue,
FAM.SValue,
MAT.Familia AS IdFamilia
FROM sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Plantilla
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
INNER JOIN sz_Catalogos UN ON UN.ID = MAT.UnidadCompra
INNER JOIN sz_Materiales MAT_CAB ON MAT_CAB.ID = MAT.Cabecera
GROUP BY
MAT_CAB.ID,
MAT_CAB.Material,
MAT_CAB.Descripcion,
FAM.IValue,
FAM.SValue,
MAT.Familia
";
            $query = $this->db->query($sql);
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getArticulosExplosionDesglosada() {
        try {
            $sql = "select SUM(PDT.Valor) AS Explosion,
MAT.Material,
MAT.Descripcion,
UN.SValue AS Unidad,
MAT.Talla,
MAT.PrecioLista,
FAM.IValue,
FAM.SValue,
SUM(PDT.Valor) * MAT.PrecioLista AS Subtotal,
MAT.Cabecera
from sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Suela
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
INNER JOIN sz_Catalogos UN ON UN.ID = MAT.UnidadCompra
GROUP BY
RC.Suela,
MAT.Material,
MAT.Descripcion,
MAT.UnidadCompra,
MAT.Talla,
MAT.PrecioLista,
FAM.IValue,
FAM.SValue,
UN.SValue,
MAT.Cabecera

UNION

select SUM(PDT.Valor) AS Explosion,
MAT.Material,
MAT.Descripcion,
UN.SValue AS Unidad,
MAT.Talla,
MAT.PrecioLista,
FAM.IValue,
FAM.SValue,
SUM(PDT.Valor) * MAT.PrecioLista AS Subtotal,
MAT.Cabecera
from sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Entresuela
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
INNER JOIN sz_Catalogos UN ON UN.ID = MAT.UnidadCompra
GROUP BY
RC.Suela,
MAT.Material,
MAT.Descripcion,
MAT.UnidadCompra,
MAT.Talla,
MAT.PrecioLista,
FAM.IValue,
FAM.SValue,
UN.SValue,
MAT.Cabecera

UNION

select SUM(PDT.Valor) AS Explosion,
MAT.Material,
MAT.Descripcion,
UN.SValue AS Unidad,
MAT.Talla,
MAT.PrecioLista,
FAM.IValue,
FAM.SValue,
SUM(PDT.Valor) * MAT.PrecioLista AS Subtotal,
MAT.Cabecera
from sz_PedidoDetalleTemp PDT
INNER JOIN sz_RangosCompras RC ON RC.Estilo = PDT.Estilo
AND RC.Talla = PDT.Talla
AND RC.Suela IS NOT NULL
AND  RC.Suela > 0
INNER JOIN sz_Materiales MAT ON MAT.ID = RC.Plantilla
INNER JOIN sz_Catalogos FAM ON FAM.ID = MAT.Familia
INNER JOIN sz_Catalogos UN ON UN.ID = MAT.UnidadCompra
GROUP BY
RC.Suela,
MAT.Material,
MAT.Descripcion,
MAT.UnidadCompra,
MAT.Talla,
MAT.PrecioLista,
FAM.IValue,
FAM.SValue,
UN.SValue,
MAT.Cabecera


ORDER BY FAM.IValue, MAT.Descripcion";
            $query = $this->db->query($sql);
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* Explosiones normales */

    public function getFamiliasExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano) {
        try {
            $this->db->select("CONVERT(VARCHAR(25),FAM.IValue)+' '+FAM.SValue AS Familia", false)
                    ->from('sz_FichaTecnica FT')
                    ->join('sz_Controles C', 'FT.Estilo = C.Estilo AND FT.Combinacion = C.Color', 'left')
                    ->join('sz_Materiales MT', 'FT.Material =  MT.ID', 'left')
                    ->join('sz_Catalogos UN', 'MT.UnidadCompra =  UN.ID', 'left')
                    ->join('sz_Catalogos FAM', 'MT.Familia =  FAM.ID', 'left')
                    ->where('C.Estatus', 'A')
                    ->where("ctMaq BETWEEN $dMaquila AND $aMaquila")
                    ->where("ctSem BETWEEN $dSemana AND $aSemana")
                    ->where('C.ctAno', $Ano)
                    ->where('C.Control IS NOT NULL', NULL, FALSE);
            switch ($TipoE) {
                case '1':
                    $this->db->where_in('FAM.IValue', array('1', '2'));
                    break;
                case '2':
                    $this->db->where_in('FAM.IValue', array('3'));
                    break;
                case '3':
                    $this->db->where_not_in('FAM.IValue', array('1', '2', '3'));
                    break;
            }
            $CamposAgrupados = array(
                'FAM.IValue',
                'FAM.SValue');
            $this->db->group_by($CamposAgrupados);
            $this->db->order_by('FAM.IValue', 'ASC');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            //print $str;
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano) {
        try {
            $this->db->select("MT.ID as idMat,"
                            . "CONVERT(VARCHAR(25),FAM.IValue)+' '+FAM.SValue AS Familia,"
                            . "MT.Material AS ClaveArticulo,"
                            . "MT.Descripcion AS Articulo,"
                            . "UN.SValue AS Unidad,"
                            . "((FT.Consumo* E.Desperdicio)* SUM (C.Pares) + FT.Consumo* SUM (C.Pares)) AS Explosion,"
                            . "FT.Precio,"
                            . "(FT.Precio* ((FT.Consumo* E.Desperdicio)+FT.Consumo)) * SUM (C.Pares) AS Subtotal"
                            . "", false)
                    ->from('sz_FichaTecnica FT')
                    ->join('sz_Controles C', 'FT.Estilo = C.Estilo AND FT.Combinacion = C.Color', 'left')
                    ->join('sz_Estilos E', 'E.ID =  C.Estilo', 'left')
                    ->join('sz_Materiales MT', 'FT.Material =  MT.ID', 'left')
                    ->join('sz_Catalogos UN', 'MT.UnidadCompra =  UN.ID', 'left')
                    ->join('sz_Catalogos FAM', 'MT.Familia =  FAM.ID', 'left')
                    ->where('C.Estatus', 'A')
                    ->where("ctMaq BETWEEN $dMaquila AND $aMaquila")
                    ->where("ctSem BETWEEN $dSemana AND $aSemana")
                    ->where('C.ctAno', $Ano)
                    ->where('C.Control IS NOT NULL', NULL, FALSE);
            switch ($TipoE) {
                case '1':
                    $this->db->where_in('FAM.IValue', array('1', '2'));
                    break;
                case '2':
                    $this->db->where_in('FAM.IValue', array('3'));
                    break;
                case '3':
                    $this->db->where_not_in('FAM.IValue', array('1', '2', '3'));
                    break;
            }
            $CamposAgrupados = array(
                'MT.ID',
                'FAM.IValue',
                'FAM.SValue',
                'Mt.Material',
                'Mt.Descripcion',
                'UN.SValue',
                'FT.Precio',
                'FT.Consumo',
                'E.Desperdicio');
            $this->db->group_by($CamposAgrupados);
            $this->db->order_by('FAM.IValue', 'ASC');
            $this->db->order_by('MT.Material', 'ASC');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            //print $str;
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getParesTotales($S, $SS, $M, $MM, $ANO) {
        try {
            return $this->db->select('SUM (C.Pares) AS PARES', false)->from('sz_Controles AS C')
                            ->where("C.ctSem BETWEEN $S AND $SS AND C.Control IS NOT NULL AND C.Estatus = 'A' AND C.ctMaq BETWEEN $M AND $MM AND C.ctAno = $ANO", null, false)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
