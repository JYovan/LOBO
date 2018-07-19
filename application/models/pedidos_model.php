<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class pedidos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("P.ID, ISNULL(P.Folio,'') AS Pedido ,"
                                    . "(CASE WHEN  P.Estatus ='ACTIVO' "
                                    . "THEN CONCAT('<span class=''badge badge-info'' style=''font-size: 15px;'' >','EN FIRME','</span>') "
                                    . "WHEN  P.Estatus ='FINALIZADO' "
                                    . "THEN CONCAT('<span class=''badge badge-success'' style=''font-size: 15px;''>','FACTURADO','</span>') "
                                    . "END) AS Estatus ,"
                                    . "C.Clave + '-'+C.RazonSocial AS 'Cliente' ,"
                                    . "FORMAT(convert(date, P.FechaPedido, 103), 'dd/MM/yyyy')   as 'Fecha Pedido', "
                                    . "US.Usuario AS 'Usuario' ", false)
                            ->from('sz_Pedidos AS P')
                            ->join('sz_Clientes AS C', 'P.Cliente = C.ID', 'left')->join('sz_Usuarios AS US', 'P.Usuario = US.ID', 'left')
                            ->where_in('P.Estatus', array('ACTIVO', 'FINALIZADO'))->order_by("P.Folio", "ASC")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCantidadesPedido($ID) {
        try {
            return $this->db->select("ID, Columna, Valor", false)
                            ->from('sz_Series UNPIVOT (Valor FOR Columna IN (T1, T2, T3, T4, T5, T6, T7, T8, T9, T10, T11, T12, T13, T14, T15, T16, T17, T18, T19, T20, T21, T22)ñ
) AS P')->where_in('P.ID', array($ID))->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID($Pedido) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS IdEstilo, '
                    . 'U.Combinacion AS IdColor, '
                    . "E.Clave AS Estilo, "
                    . "E.Descripcion AS EstiloD, "
                    . "C.Clave AS Color, "
                    . "C.Descripcion AS ColorD, "
                    . "U.Sem AS Sem,"
                    . "U.Maq AS Maq,"
                    . "CASE WHEN C1 <= 0 THEN '-' ELSE C1 END AS C1, "
                    . "C2, "
                    . "C3, "
                    . "C4, "
                    . "C5, "
                    . "C6, "
                    . "C7, "
                    . "C8, "
                    . "C9, "
                    . "C10, "
                    . "C11, "
                    . "C12, "
                    . "C13, "
                    . "C14, "
                    . "C15, "
                    . "C16, "
                    . "C17, "
                    . "C18, "
                    . "C19, "
                    . "C20, "
                    . "C21, "
                    . "C22,"
                    . "(C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22) AS Pares,"
                    . "'$'+CONVERT(varchar, CAST(U.Precio AS money), 1) AS Precio , "
                    . "'$'+CONVERT(varchar, CAST(U.Precio* (C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22) AS money), 1) AS Importe , "
                    . "'$'+CONVERT(varchar, CAST(  (U.Precio* (C1+C2+C3+C4+C5+C6+C7+C8+C9+C10+C11+C12+C13+C14+C15+C16+C17+C18+C19+C20+C21+C22)) * (ISNULL(Desc_Por,0)/100)  AS money), 1) AS 'Desc',"
                    . "U.FechaEntrega AS Entrega,"
                    . "'<span class=''fa fa-trash-alt'' "
                    . "onclick=''onEliminarDetalle('+      "
                    . "REPLACE(LTRIM(REPLACE(U.ID, '0', ' ')), ' ', '0') +')  ''></span>' AS '-' "
                    . ", S.ID AS Serie", false);
            $this->db->from('sz_PedidosDetalle AS U')
                    ->join('sz_Estilos AS E', 'U.Estilo = E.ID')->join('sz_Combinaciones AS C', 'U.Combinacion = C.ID')
                    ->join('sz_Pedidos AS PE', 'U.Pedido = PE.ID')->join('sz_series AS S', 'E.Serie = S.ID')
                    ->where('U.Pedido', $Pedido);
            $query = $this->db->get();
            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXDetalleByID($Pedido) {
        try {
            return $this->db->select("S.ID, S.T1,S.T2,S.T3,S.T4,S.T5,S.T6,S.T7,S.T8, S.T9,S.T10,S.T11,S.T12,S.T13,S.T14,S.T15, S.T16,S.T17,S.T18,S.T19,S.T20,S.T21,S.T22", false)
                            ->from('sz_PedidosDetalle AS U')->join('sz_Estilos AS E', 'U.Estilo = E.ID')->join('sz_series AS S', 'E.Serie = S.ID')
                            ->where('U.Pedido', $Pedido)->group_by(array('S.ID', 'S.T1', 'S.T2', 'S.T3', 'S.T4', 'S.T5', 'S.T6', 'S.T7', 'S.T8', 'S.T9', 'S.T10', 'S.T11', 'S.T12', 'S.T13', 'S.T14', 'S.T15', 'S.T16', 'S.T17', 'S.T18', 'S.T19', 'S.T20', 'S.T21', 'S.T22'))->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarEstiloXCombinacion($ID, $E, $C) {
        try {
            return $this->db->select("COUNT (*) AS EXISTE", false)->from('sz_PedidosDetalle AS PD')->where('Pedido', $ID)->where('Estilo', $E)->where('Combinacion', $C)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarCantidad($ID, $E, $C, $P) {
        try {
            return $this->db->select("TOP 1 SUM($P) AS x36", false)->from('sz_PedidosDetalle AS PD')
                            ->where('Pedido', $ID)->where('Estilo', $E)->where('Combinacion', $C)->group_by(array('' . $P, 'ID'))
                            ->order_by("ID", "ASC")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarCantidadPorFila($ID, $E, $C, $P) {
        try {
            $this->db->select("TOP 1 "
                    . "CASE "
                    . "WHEN (C1 + C2 + C3 + C4 + C5 + C6 + C7 + C8 + C9 + C10 + C11 + C12 + C13 + C14 + C15 + C16 + C17 + C18 + C19 + C20 + C21 + C22) IS NULL THEN 0 "
                    . "ELSE (C1 + C2 + C3 + C4 + C5 + C6 + C7 + C8 + C9 + C10 + C11 + C12 + C13 + C14 + C15 + C16 + C17 + C18 + C19 + C20 + C21 + C22) END AS x36", false)->from('sz_PedidosDetalle AS PD')
                    ->where('Pedido', $ID)->where('Estilo', $E)->where('Combinacion', $C)
                    ->where('(C1 + C2 + C3 + C4 + C5 + C6 + C7 + C8 + C9 + C10 + C11 + C12 + C13 + C14 + C15 + C16 + C17 + C18 + C19 + C20 + C21 + C22) < 37',null,false)
                    ->group_by(array('ID', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'C11', 'C12', 'C13', 'C14', 'C15', 'C16', 'C17', 'C18', 'C19', 'C20', 'C21', 'C22'))
                    ->order_by("ID", "DESC");
            $query = $this->db->get();
            $str = $this->db->last_query();
//            print "\n * SQL FOR $ID, $E, $C, $P * \n" . $str . "\n";
            $data = $query->result();
//            var_dump($data);
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Pedidos", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle($array) {
        try {
            $this->db->insert("sz_PedidosDetalle", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_Pedidos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($Pedido, $Estilo, $Color, $Posicion, $Cantidad) {
        try {
            $DATA = array($Posicion => $Cantidad);
            $this->db->where('Estilo', $Estilo)
                    ->where('Combinacion', $Color)
                    ->where('Pedido', $Pedido)
                    ->where('(C1 + C2 + C3 + C4 + C5 + C6 + C7 + C8 + C9 + C10 + C11 + C12 + C13 + C14 + C15 + C16 + C17 + C18 + C19 + C20 + C21 + C22) < 36', null, false)
                    ->update("sz_PedidosDetalle", $DATA);
//            print "\n + UPDATE + \n".$this->db->last_query()."\n";
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->db->where('ID', $ID)->update("sz_Pedidos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->where('ID', $ID)->delete("sz_PedidosDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidoByID($ID) {
        try {
            return $this->db->select('U.*', false)->from('sz_Pedidos AS U')->where('U.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidoEncabezadoDetalleByID($ID) {
        try {
            return $this->db->select('U.*', false)->from('sz_Pedidos AS U')->where('U.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstiloTR($Estilo) {
        try {
            return $this->db->select("S.T1,S.T2,S.T3,S.T4,S.T5,S.T6,S.T7,S.T8,S.T9,S.T10,S.T11,S.T12,S.T13,S.T14,S.T15,S.T16,S.T17,S.T18,S.T19,S.T20,S.T21,S.T22", false)
                            ->from('sz_Estilos AS E')->join('sz_Series AS S', 'E.Serie = S.ID', 'left')->where('E.ID', $Estilo)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAgenteXCliente($ID) {
        try {
            return $this->db->select("V.ID AS AGENTE", false)->from('sz_Clientes AS V')->where('V.ID', $ID)->where_in('V.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
