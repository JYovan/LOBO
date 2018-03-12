<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class materialesxcombinacion_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
   
    public function getRecords() {
        try {
            $this->db->select("MXC.[ID]
      ,E.Descripcion AS ESTILO
      ,C.Descripcion AS COMBINACION
      ,MXC.Registro AS REGISTRO ", false);
            $this->db->from('MaterialesXCombinacion AS MXC ');
            $this->db->join('Estilos AS E','MXC.Estilo = E.ID');
            $this->db->join('Combinaciones AS C','MXC.Combinacion = C.ID');
            $this->db->where_in('MXC.Estatus', array('ACTIVO'));
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
    public function getMaterialesRequeridos() {
        try {
            $this->db->select('M.[ID] ,M.[Material] AS MATERIAL,M.Descripcion AS "DESCRIPCIÓN",  C.SValue AS "U.M", M.[PrecioLista] AS PRECIO', false);
            $this->db->from('Materiales AS M ');
            $this->db->join('Catalogos AS C','M.UnidadConsumo = C.ID');
            $this->db->like('C.FieldId','UNIDADES');
            $this->db->like('C.Estatus','ACTIVO');
            $this->db->where_in('M.Estatus', array('ACTIVO'));
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
            $this->db->insert("MaterialesXCombinacion", $array);
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
            $this->db->insert("MaterialesXCombinacionDetalle", $array);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("MaterialesXCombinacion", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("MaterialesXCombinacion");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getMaterialesXCombinacionByID($ID) {
        try {
            $this->db->select('MXCD.*', false);
            $this->db->from('MaterialesXCombinacion AS MXC ');
            $this->db->join('MaterialesXCombinacionDetalle AS MXCD','MXC.ID = MXCD.MaterialXCombinacion');
            $this->db->where('M.ID', $ID);
            $this->db->where_in('M.Estatus', 'ACTIVO');
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
     
    
    public function getCombinaciones() {
        try {
            $this->db->select('C.ID AS ID, C.Descripcion AS COMBINACION', false);
            $this->db->from('Combinaciones AS C');  
            $this->db->where_in('C.Estatus', array('ACTIVO'));
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
            $this->db->select('E.ID AS ID, E.Descripcion AS ESTILO', false);
            $this->db->from('Estilos AS E');  
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
}
