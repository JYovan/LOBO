<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class series_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("U.ID, U.Descripcion, U.PuntoInicial AS 'Punto Inicial', U.PuntoFinal AS 'Punto Final' ", false);
            $this->db->from('Series AS U');
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

    public function getSeries() {
        try {
            $this->db->select("U.ID, U.Descripcion", false);
            $this->db->from('Series AS U');
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
    
    public function getSeriesDetallebySerieID($ID) {
        try {
            $this->db->select("U.ID AS ID, U.Serie_ID, U.Talla, U.Cantidad, CONCAT('<button type=\"button\" class=\"btn btn-dark\" id=\"btnEliminarPunto\" onclick=\"onEliminarPunto(this)\">','<span class=\"fa fa-minus\"></span></button>') AS ELIMINAR", false);
            $this->db->from('SeriesDetalle AS U');
            $this->db->where_in('U.Serie_ID', $ID);
            $this->db->order_by("U.Talla", "ASC");
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
            $this->db->insert("Series", $array);
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
            $this->db->insert("SeriesDetalle", $array);
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
            $this->db->update("Series", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("SeriesDetalle", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("Series");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->where('Estatus', 'INACTIVO');
            $this->db->where('Serie_ID', $ID);
            $this->db->delete("SeriesDetalle");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function onDesactivar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('Serie_ID', $ID);
            $this->db->update("SeriesDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('Series AS U');
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
