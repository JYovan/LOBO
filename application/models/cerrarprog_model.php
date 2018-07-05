<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class cerrarprog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select('PD.ID AS ID, '
                            . 'PD.Estilo AS IdEstilo, '
                            . 'PD.Combinacion AS IdColor, '
                            . "E.Clave AS Estilo, "
                            . "E.Descripcion AS \"Descripcion Estilo\", "
                            . "C.Clave AS Color, "
                            . "C.Descripcion AS \"Descripcion Color\", "
                            . "PE.Folio AS Pedido,"
                            . "PE.[FechaPedido] AS \"Fecha Pedido\","
                            . "PE.[FechaRec] AS \"Fecha Entrega\","
                            . "PE.[Registro] AS \"Fecha Captura\","
                            . "PD.Sem AS Semana,"
                            . "PD.Maq AS Maq,"
                            . "CL.Clave AS Cliente,"
                            . "CL.RazonSocial AS \"Cliente Razon\","
                            . "(C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22) AS Pares,"
                            . "'$'+CONVERT(varchar, CAST(PD.Precio AS money), 1) AS Precio , "
                            . "'$'+CONVERT(varchar, CAST(PD.Precio* (C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22) AS money), 1) AS Importe , "
                            . "'$'+CONVERT(varchar, CAST(  (PD.Precio* (C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22)) * (ISNULL(Desc_Por,0)/100)  AS money), 1) AS 'Desc',"
                            . "PD.FechaEntrega AS Entrega,"
                            . "CONCAT(S.PuntoInicial ,'/',S.PuntoFinal) AS Serie, PD.Ano AS Anio,"
                            . " CASE "
                            . "WHEN PD.McaControl IS NULL THEN '' ELSE PD.McaControl END AS Marca, "
                            . "CONCAT(CT.ctAno, CT.ctMaq, CT.ctSem, CT.ctCons) AS Control,"
                            . "S.ID AS SerieID,PE.ID AS ID_PEDIDO", false)->from('sz_PedidosDetalle AS PD')
                    ->join('sz_Pedidos AS PE', 'PD.Pedido = PE.ID')->join('sz_Clientes AS CL', 'CL.ID = PE.Cliente')
                    ->join('sz_Estilos AS E', 'PD.Estilo = E.ID')->join('sz_Combinaciones AS C', 'PD.Combinacion = C.ID')
                    ->join('sz_series AS S', 'E.Serie = S.ID')
                    ->join('sz_Controles AS CT', 'CT.PedidoDetalle = PD.ID', 'left')
                            ->where('PD.McaControl', 1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getHistorialDeControles() {
        try {
            return $this->db->select('HC.', false)->from('sz_HistorialControles AS HC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaximoConsecutivo($M, $S, $ID) {
        try {
            $this->db->select('CASE WHEN CT.ctCons IS NULL THEN 1 ELSE CT.ctCons+1 END AS MAX', false)->from('sz_PedidosDetalle AS PD')
                    ->join('sz_Pedidos AS PE', 'PD.Pedido = PE.ID')->join('sz_Clientes AS CL', 'CL.ID = PE.Cliente')
                    ->join('sz_Estilos AS E', 'PD.Estilo = E.ID')->join('sz_Combinaciones AS C', 'PD.Combinacion = C.ID')
                    ->join('sz_series AS S', 'E.Serie = S.ID')
                    ->join('sz_Controles AS CT', 'CT.PedidoDetalle = PD.ID', 'left')
                    ->where('PD.McaControl', 1)->where('PD.Maq', $M)->where('PD.Sem', $S);
            if ($ID > 0) {
                $this->db->where_not_in('PD.ID', array($ID));
            }
            return $this->db->order_by('CT.ctCons', 'DESC')
                            ->limit(1)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarControl($x) {
        try {
            $this->db->insert("sz_Controles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarHistorialControl($x) {
        try {
            $this->db->insert("sz_HistorialControles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}