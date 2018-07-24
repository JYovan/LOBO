<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class proveedores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("P.ID AS ID, P.Clave AS CLAVE, P.RazonSocial AS PROVEEDOR, P.RFC AS RFC, CASE WHEN P.Estatus= 'ACTIVO' THEN CONCAT('<strong class=\"text-success\">','ACTIVO','</span>') ELSE 'INACTIVO' END  AS ESTATUS", false);
            $this->db->from('sz_Proveedores AS P');
            $this->db->where_in('P.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            $this->db->select("P.ID AS ID, P.Clave +' '+ P.RazonSocial AS Nombre", false);
            $this->db->from('sz_Proveedores AS P');
            $this->db->where_in('P.Estatus', 'ACTIVO');
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

    public function getUID() {
        try {
            return $this->db->select("TOP 1 P.IdProveedor AS ID", false)->from('Proveedores AS P')->order_by('P.IdProveedor', 'DESC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMagnusID($ID) {
        try {
            $this->db->select("P.IDMAGNUS AS MAGNUS", false);
            $this->db->from('sz_Proveedores AS P');
            $this->db->where_in('P.Estatus', 'ACTIVO');
            $this->db->where('P.ID', $ID);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarProveedorXRFC($ID, $RFC) {
        try {
            $this->db->select("COUNT(P.ID) AS EXISTE", false);
            $this->db->from('sz_Proveedores AS P');
            $this->db->where_in('P.RFC', $RFC);
            if ($ID > 0) {
                $this->db->where('P.ID <> ' . $ID, null, false);
            }
            $this->db->where_in('P.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRegimenesFiscales() {
        try {
            $this->db->select('C.ID, CONVERT(varchar(10), C.IValue)+\'-\'+C.SValue+\'-\'+C.Valor_Text AS SValue', false);
            $this->db->from('sz_Catalogos AS C');
            $this->db->where('C.FieldId', 'REGIMENES FISCALES');
            $this->db->where_in('C.Estatus', 'ACTIVO');
            $this->db->order_by("C.IValue", "ASC");
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

    public function getProveedorByID($ID) {
        try {
            $this->db->select("P.*", false);
            $this->db->from('sz_Proveedores AS P');
            $this->db->where('P.ID', $ID);
            $this->db->where_in('P.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarMagnus($array) {
        try {
            $this->db->insert("Proveedores", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Proveedores", $array);
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
            $this->db->update("sz_Proveedores", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarMagnus($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("Proveedores", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
