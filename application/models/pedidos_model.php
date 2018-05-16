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
            $this->db->select("U.ID, ISNULL(U.Folio,'') AS Pedido ,"
                    . "(CASE WHEN  U.Estatus ='ACTIVO' "
                    . "THEN CONCAT('<span class=''badge badge-info'' style=''font-size: 15px;'' >','EN FIRME','</span>') "
                    . "WHEN  U.Estatus ='FINALIZADO' "
                    . "THEN CONCAT('<span class=''badge badge-success'' style=''font-size: 15px;''>','FACTURADO','</span>') "
                    . "END) AS Estatus ,"
                    . "C.Clave + '-'+C.RazonSocial AS 'Cliente' ,"
                    . "FORMAT(convert(date, U.FechaPedido, 103), 'dd/MM/yyyy')   as 'Fecha Pedido ', "
                    . "US.Usuario AS 'Usuario' ", false);
            $this->db->from('sz_Pedidos AS U');
            $this->db->join('sz_Clientes AS C', 'U.Cliente = C.ID', 'left');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where_in('U.Estatus', array('ACTIVO', 'FINALIZADO'));
            $this->db->order_by("U.Folio", "ASC");
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            //print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID($Pedido) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS IdEstilo, '
                    . 'U.Combinacion AS IdColor, '
                    . "E.Clave +'-'+C.Clave+' '+C.Descripcion AS Estilo, "
                    . "U.Sem AS Sem,"
                    . "U.Maq AS Maq,"
                    . "C1, "
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
                    . " ", false);
            $this->db->from('sz_PedidosDetalle AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'U.Combinacion = C.ID');
            $this->db->join('sz_Pedidos AS PE', 'U.Pedido = PE.ID');
            $this->db->where('U.Pedido', $Pedido);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            //print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarEstiloXCombinacion($ID, $E, $C) {
        try {
            $this->db->select("COUNT (*) AS EXISTE", false);
            $this->db->from('sz_PedidosDetalle AS PD');
            $this->db->where('PD.Pedido', $ID);
            $this->db->where('PD.Estilo', $E);
            $this->db->where('PD.Combinacion', $C);

            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            //print $str;
            $data = $query->result();
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
            $this->db->where('ID', $ID);
            $this->db->update("sz_Pedidos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($Pedido, $Estilo, $Color, $Posicion, $Cantidad) {
        try {
            $DATA = array(
                $Posicion => $Cantidad
            );
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Combinacion', $Color);
            $this->db->where('Pedido', $Pedido);
            $this->db->update("sz_PedidosDetalle", $DATA);
            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Pedidos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_PedidosDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidoByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Pedidos AS U');
            $this->db->where('U.ID', $ID);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPedidoEncabezadoDetalleByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Pedidos AS U');
            $this->db->where('U.ID', $ID);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
