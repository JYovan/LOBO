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
            $this->db->select("P.ID AS ID, P.Clave AS CLAVE, P.RazonSocial AS PROVEEDOR, P.RFC AS RFC, CASE WHEN P.Estatus= 'A' THEN CONCAT('<strong class=\"text-success\">','A','</span>') ELSE 'I' END  AS ESTATUS", false);
            $this->db->from('sz_Proveedores AS P');
            $this->db->where_in('P.Estatus', 'A');
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

}
