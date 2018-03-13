<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fraccionesxestilo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("FXE.ID
      ,E.Descripcion AS Estilo,
      ,FXE.Registro AS Registro ", false);
            $this->db->from('FraccionesXEstilo AS FXE ');
            $this->db->join('Estilos AS E', 'FXE.Estilo = E.ID');
            $this->db->where_in('FXE.Estatus', array('ACTIVO'));
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
