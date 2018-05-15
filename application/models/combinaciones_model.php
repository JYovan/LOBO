<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class combinaciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("U.ID, E.Clave + '-'+ E.Descripcion AS Estilo, ISNULL(U.Clave,'')+'-'+U.Descripcion AS Color ", false);
            $this->db->from('sz_Combinaciones AS U');
            $this->db->join('sz_Estilos AS E', 'E.ID = U.Estilo', 'left');
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->order_by("E.Clave", "ASC");
            $this->db->order_by("U.Clave", "ASC");
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

    public function getUltimaClave($Estilo) {
        try {
            $this->db->select('MAX(U.Clave) As Clave ', false);
            $this->db->from('sz_Combinaciones AS U');
            $this->db->where('U.Estilo', $Estilo);
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

    public function getCombinacionesXEstilo($Estilo) {
        try {
            $this->db->select("U.ID, U.Clave+'-'+ U.Descripcion AS Descripcion ", false);
            $this->db->from('sz_Combinaciones AS U');
            $this->db->where_in('U.Estilo', $Estilo);
            $this->db->where_in('U.Estatus', 'ACTIVO');
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

    public function getCombinacionesXEstiloConExistencias($Estilo) {
        try {
            $this->db->select("C.ID, C.Clave+'-'+ C.Descripcion AS Descripcion ", false);
            $this->db->from('sz_Combinaciones AS C');
            $this->db->join('sz_Existencias AS E', 'C.ID = E.Color');
            $this->db->where_in('C.Estilo', $Estilo);
            $this->db->where('(E.Ex1+E.Ex2+E.Ex3+E.Ex4+E.Ex5+E.Ex6+E.Ex7+E.Ex8+E.Ex9+E.Ex10+E.Ex11+E.Ex12+E.Ex13+E.Ex14+E.Ex15+E.Ex16+E.Ex17+E.Ex18+E.Ex19+E.Ex20+E.Ex21+E.Ex22) > 0', NULL, false);
            $this->db->where_in('C.Estatus', 'ACTIVO');
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
            $this->db->insert("sz_Combinaciones", $array);
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
            $this->db->update("sz_Combinaciones", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Combinaciones");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Combinaciones AS U');
            $this->db->where('U.ID', $ID);
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
