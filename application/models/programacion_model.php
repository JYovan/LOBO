<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class programacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select('U.ID AS ID, '
                                    . 'U.Estilo AS IdEstilo, '
                                    . 'U.Combinacion AS IdColor, '
                                    . "E.Clave AS Estilo, "
                                    . "E.Descripcion AS \"Descripcion Estilo\", "
                                    . "C.Clave AS Color, "
                                    . "C.Descripcion AS \"Descripcion Color\", "
                                    . "PE.Folio AS Pedido,"
                                    . "PE.[FechaPedido] AS \"Fecha Pedido\","
                                    . "PE.[FechaRec] AS \"Fecha Entrega\","
                                    . "PE.[Registro] AS \"Fecha Captura\","
                                    . "U.Sem AS Semana,"
                                    . "U.Maq AS Maq,"
                                    . "CL.Clave AS Cliente,"
                                    . "CL.RazonSocial AS \"Cliente Razon\","
                                    . "(C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22) AS Pares,"
                                    . "'$'+CONVERT(varchar, CAST(U.Precio AS money), 1) AS Precio , "
                                    . "'$'+CONVERT(varchar, CAST(U.Precio* (C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22) AS money), 1) AS Importe , "
                                    . "'$'+CONVERT(varchar, CAST(  (U.Precio* (C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22)) * (ISNULL(Desc_Por,0)/100)  AS money), 1) AS 'Desc',"
                                    . "U.FechaEntrega AS Entrega,"
                                    . "CONCAT(S.PuntoInicial ,'/',S.PuntoFinal) AS Serie, U.Ano AS Anio", false)->from('sz_PedidosDetalle AS U')
                            ->join('sz_Pedidos AS PE', 'U.Pedido = PE.ID')->join('sz_Clientes AS CL', 'CL.ID = PE.Cliente')
                            ->join('sz_Estilos AS E', 'U.Estilo = E.ID')->join('sz_Combinaciones AS C', 'U.Combinacion = C.ID')
                            ->join('sz_series AS S', 'E.Serie = S.ID')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle($x) {
        try {
            $this->db->insert("sz_Controles", $x);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
