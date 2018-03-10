<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class permisos_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
   
    public function getRecords() {
        try {
            $this->db->select("P.ID AS ID, 
                P.UsuarioT AS USUARIO, 
                P.ModuloT AS MODULO, 
                P.Ver AS VER, 
                P.Crear AS CREAR, 
                P.Modificar AS MODIFICAR, 
                P.Eliminar AS ELIMINAR, 
                P.Consultar AS CONSULTAR, 
                P.Reportes AS REPORTES, 
                P.Buscar AS BUSCAR, 
                P.Estatus  AS ESTATUS, 
                P.Registro AS REGISTRO ", false);
            $this->db->from('Permisos AS P');
            $this->db->where_in('P.Estatus', array('ACTIVO'));
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
    public function getModulos(){
        try {
            $this->db->select("M.ID AS ID, M.Modulo AS MODULO  ", false);
            $this->db->from('Modulos AS M');
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
    
    public function getUsuarios(){
        try {
            $this->db->select("U.ID AS ID, U.Usuario AS USUARIO  ", false);
            $this->db->from('Usuarios AS U');
            $this->db->where_in('U.Estatus', array('ACTIVO'));
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
            $this->db->insert("Permisos", $array);
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
            $this->db->update("Permisos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("Permisos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getPermisoByID($ID) {
        try {
            $this->db->select('P.*', false);
            $this->db->from('Permisos AS P');
            $this->db->where('P.ID', $ID);
            $this->db->where_in('P.Estatus', 'ACTIVO');
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
