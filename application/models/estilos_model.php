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
                    . "WHEN E.Linea IS NULL THEN '<span class=\"badge badge-danger\">SIN LINEA</span>' ELSE L.Descripcion END AS Linea, E.Clave AS Clave, E.Descripcion AS Descripción, E.Estatus AS Estatus,  E.Registro AS Registro", false);
            $this->db->from('sz_Estilos AS E');
            $this->db->join('sz_Lineas AS L', 'E.Linea = L.ID', 'left');
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
            $this->db->select("U.ID, U.Clave, U.Clave+'-'+U.Descripcion AS Descripcion ", false);
            $this->db->from('sz_Estilos AS U');
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
            $this->db->insert("sz_Estilos", $array);
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
            $this->db->update("sz_Estilos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Estilos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID($ID) {
        try {
            $this->db->select('E.*', false);
            $this->db->from('sz_Estilos AS E');
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

    public function getSerieXEstilo($Estilo) {
        try {
            $this->db->select("S.*, E.Clave AS ClaveEstilo", false);
            $this->db->from('sz_Estilos AS E');
            $this->db->join('sz_Series AS S', 'E.Serie = S.ID', 'left');
            $this->db->where('E.ID', $Estilo);
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

    public function getEncabezadoSerieXEstilo($Estilo) {
        try {
            $this->db->select("S.T1, "
                    . "S.T2,"
                    . "S.T3,"
                    . "S.T4,"
                    . "S.T5,"
                    . "S.T6,"
                    . "S.T7,"
                    . "S.T8,"
                    . "S.T9,"
                    . "S.T10,"
                    . "S.T11,"
                    . "S.T12,"
                    . "S.T13,"
                    . "S.T14,"
                    . "S.T15,"
                    . "S.T16,"
                    . "S.T17,"
                    . "S.T18,"
                    . "S.T19,"
                    . "S.T20,"
                    . "S.T21,"
                    . "S.T22"
                    . "", false);
            $this->db->from('sz_Estilos AS E');
            $this->db->join('sz_Series AS S', 'E.Serie = S.ID', 'left');
            $this->db->where('E.ID', $Estilo);
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

}
