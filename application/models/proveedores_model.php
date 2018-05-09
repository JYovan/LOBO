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
            $this->db->select("P.ID, P.Clave, P.RazonSocial as 'Nombre' ", false);
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


}
