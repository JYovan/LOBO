<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class estilos_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
   
    public function getRecords() {
        try {
            $this->db->select("E.ID, "
                    . "CASE "
                    . "WHEN E.Linea IS NULL THEN '<span class=\"badge badge-danger\">SIN LINEA</span>' ELSE L.Descripcion END AS LINEA, E.Clave AS CLAVE, E.Descripcion AS DESCRIPCION, E.Estatus AS ESTATUS,  E.Registro AS REGISTRO", false);
            $this->db->from('Estilos AS E');
            $this->db->join('Lineas AS L','E.Linea = L.ID','left');
            $this->db->where_in('E.Estatus', array('ACTIVO'));
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    } 
    
     public function getEstilos() {
        try {
            $this->db->select("U.ID, U.Clave, U.Descripcion", false);
            $this->db->from('Estilos AS U');
            $this->db->where_in('U.Estatus', 'ACTIVO');
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
    
    public function onAgregar($array) {
        try {
            $this->db->insert("Estilos", $array);
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
            $this->db->update("Estilos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("Estilos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getEstiloByID($ID) {
        try {
            $this->db->select('E.*', false);
            $this->db->from('Estilos AS E');
            $this->db->where('E.ID', $ID);
            $this->db->where_in('E.Estatus', 'ACTIVO');
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
