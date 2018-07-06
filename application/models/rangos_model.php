<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class rangos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("E.ID, E.Clave+'-'+E.Descripcion AS Estilo ", false);
            $this->db->from('sz_RangosCompras AS RC ');
            $this->db->join('sz_Estilos AS E', 'RC.Estilo = E.ID', 'left');
            $this->db->where_in('RC.Estatus', array('ACTIVO'));
            $this->db->group_by(array('E.ID', 'E.Clave', 'E.Descripcion'));
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

    public function onComprobarExisteEstilo($Estilo) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_RangosCompras AS FXE ');
            $this->db->where('FXE.Estilo', $Estilo);
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

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_RangosCompras", $array);
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
            $this->db->update("sz_RangosCompras", $DATA);
            //print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('Estilo', $ID);
            $this->db->update("sz_RangosCompras");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_RangosCompras");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionEstiloByIDEstilo($ID) {
        try {
            $this->db->select('U.Estilo, U.Fecha, U.Estatus', false);
            $this->db->from('sz_RangosCompras AS U');
            $this->db->where('U.Estilo', $ID);
            $this->db->where_in('U.Estatus', 'ACTIVO');
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
