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
                CASE 
                WHEN P.Ver = 1 THEN '<span class=\"badge badge-success\">SI</span>' 
                ELSE '<span class=\"badge badge-danger\">NO</span>'
                END AS VER,
                CASE 
                WHEN P.Crear = 1 THEN '<span class=\"badge badge-success\">SI</span>' 
                ELSE '<span class=\"badge badge-danger\">NO</span>'
                END AS CREAR, 
                CASE 
                WHEN P.Modificar = 1 THEN '<span class=\"badge badge-success\">SI</span>' 
                ELSE '<span class=\"badge badge-danger\">NO</span>'
                END  AS MODIFICAR, 
                CASE 
                WHEN P.Eliminar = 1 THEN '<span class=\"badge badge-success\">SI</span>' 
                ELSE '<span class=\"badge badge-danger\">NO</span>'
                END AS ELIMINAR,
                CASE 
                WHEN P.Consultar = 1 THEN '<span class=\"badge badge-success\">SI</span>' 
                ELSE '<span class=\"badge badge-danger\">NO</span>'
                END  AS CONSULTAR, 
                CASE 
                WHEN P.Reportes = 1 THEN '<span class=\"badge badge-success\">SI</span>' 
                ELSE '<span class=\"badge badge-danger\">NO</span>'
                END  AS REPORTES, 
                CASE 
                WHEN P.Buscar = 1 THEN '<span class=\"badge badge-success\">SI</span>' 
                ELSE '<span class=\"badge badge-danger\">NO</span>'
                END AS BUSCAR, 
                CASE 
                WHEN P.Estatus = 'ACTIVO' THEN '<span class=\"badge badge-success\">ACTIVO</span>' 
                ELSE '<span class=\"badge badge-danger\">INACTIVO</span>' 
                END  AS ESTATUS, 
                P.Registro AS REGISTRO ", false);
            $this->db->from('sz_Permisos AS P');
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
            $this->db->from('sz_Modulos AS M');
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
            $this->db->from('sz_Usuarios AS U');
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
            $this->db->insert("sz_Permisos", $array);
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
            $this->db->update("sz_Permisos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Permisos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getPermisoByID($ID) {
        try {
            $this->db->select('P.*', false);
            $this->db->from('sz_Permisos AS P');
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
