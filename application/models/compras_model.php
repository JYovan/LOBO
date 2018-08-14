<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class compras_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("P.ID, "
                                    . "ISNULL(P.Folio,'') AS Folio ,"
                                    . "P.Maq AS Maquila,"
                                    . "FORMAT(convert(date, P.Fecha, 103), 'dd/MM/yyyy')   as 'Fecha', "
                                    . "C.Clave + '-'+C.RazonSocial AS 'Proveedor' ,"
                                    . "P.Grupo  'Grupo' ,"
                                    . "'$'+CONVERT(varchar, CAST(P.Importe AS money), 1) AS Importe , "
                                    . "P.Sem  'Semana' ,"
                                    . "P.Ano  'Ano' ,"
                                    . "US.Usuario AS 'Usuario' ", false)
                            ->from('sz_Compras AS P')
                            ->join('sz_Proveedores AS C', 'P.Proveedor = C.ID', 'left')
                            ->join('sz_Usuarios AS US', 'P.Usuario = US.ID', 'left')
                            ->where_in('P.Estatus', array('ACTIVO'))
                            ->order_by("P.Folio", "ASC")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUID() {
        try {
            return $this->db->select("TOP 1 C.Folio AS UID", false)->from('sz_Compras AS C')->order_by('C.Folio', 'DESC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCompraByID($ID) {
        try {
            $this->db->select('U.*', false)->from('sz_Compras AS U')->where('U.ID', $ID)->where_in('U.Estatus', 'ACTIVO');
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

    public function getReporteCompraByID($ID) {
        try {
            $this->db->select("CO.Folio AS OrdenCompra, CO.Estatus, CO.Fecha, PROV.Clave AS ClaveProv, 
                PROV.RazonSocial AS NombreProv, COD.Observaciones AS Observaciones, 
                COD.ConsignarA AS ConsignarA, COD.Cantidad, UN.SValue AS Unidad, 
                MAT.Material AS ClaveArticulo, MAT.Descripcion, 
                ISNULL(CONVERT(varchar(10) ,MAT.Talla),' ')  Talla, COD.Precio, 
                COD.Precio *  COD.Cantidad AS Subtotal, CO.Sem AS Semana, 
                CO.Maq AS Maquila, COD.FechaEntrega, CO.Tp AS FR", false)
                    ->from('sz_Compras CO')
                    ->join('sz_ComprasDetalle COD', 'CO.ID = COD.OrdenCompra')
                    ->join('sz_Proveedores PROV', 'CO.Proveedor = PROV.ID')
                    ->join('sz_Materiales MAT', 'COD.Articulo = MAT.ID')
                    ->join('sz_Catalogos UN', 'MAT.UnidadCompra = UN.ID')
                    ->where('CO.ID', $ID);
            $this->db->where_in('CO.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str; 
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleCompraByID($ID) {
        try {
            $this->db->select('CD.ID,'
                    . 'CD.Articulo AS IdMat,'
                    . 'M.Material,'
                    . 'M.Descripcion,'
                    . 'CD.Cantidad,'
                    . 'CD.Precio,'
                    . 'UM.SValue AS Unidad,'
                    . "CONCAT('$',CONVERT(varchar,CAST((CD.Subtotal) AS money), 1),'')  'Subtotal' ,"
                    . 'CD.FechaEntrega,'
                    . 'CD.ConsignarA AS Consignar,'
                    . 'CONCAT(\'<span class="fa fa-trash fa-lg" onclick="onEliminarCompraDetalleByID(\',CD.ID,\')">\',\'</span>\') AS Eliminar'
                    . '', false);
            $this->db->from('sz_ComprasDetalle AS CD')
                    ->join('sz_Compras AS C', 'C.ID= CD.OrdenCompra', 'left')->join('sz_Materiales AS M', 'M.ID = CD.Articulo', 'left')
                    ->join('sz_Catalogos AS UM', 'M.UnidadCompra = UM.ID', 'left')->where('C.ID', $ID)->where_in('C.Estatus', 'ACTIVO');
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

    public function getMaterialesRequeridos($Familia) {
        try {
            $this->db->select("M.[ID] AS ID,M.Material+'-'+ M.Descripcion AS Material", false)
                    ->from('sz_Materiales AS M')
                    ->join('sz_Catalogos FAM', 'M.Familia =  FAM.ID', 'left')
                    ->where_in('M.Estatus', array('ACTIVO'));
            switch ($Familia) {
                case "1":
                    $this->db->where_in('FAM.IValue', array('1', '2'));
                    break;
                case "2":
                    $this->db->where_in('FAM.IValue', array('3', '50', '52'));
                    $this->db->where('M.Descripcion NOT LIKE \'%**CBZ**%\'', null, false);
                    $this->db->where('M.Descripcion NOT LIKE \'%*CAB*%\'', null, false);

                    break;
                case "3":
                    $this->db->where_not_in('FAM.IValue', array('1', '2', '3'));
                    break;
            }
            return $this->db->order_by("M.Material", "ASC")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Compras", $array);
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
            $this->db->update("sz_Compras", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Compras");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCompraDetalleByID($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_ComprasDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}