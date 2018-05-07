<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class pedidos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            /* $this->db->select("*", false);
              $this->db->from('sz_Piezas AS U');
              $this->db->where_in('U.Estatus', 'ACTIVO');
              $query = $this->db->get(); */
            /*
             * FOR DEBUG ONLY
             */
            /* $str = $this->db->last_query();
              $data = $query->result();
              return $data; */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
