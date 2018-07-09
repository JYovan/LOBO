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
            $this->db->from('sz_RangosCompras AS RC ')
                    ->join('sz_Estilos AS E', 'RC.Estilo = E.ID', 'left')
                    ->where_in('RC.Estatus', array('ACTIVO'))
                    ->group_by(array('E.ID', 'E.Clave', 'E.Descripcion'));
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

    public function getRecordByID($ID) {
        try {
            $this->db->select("RC.* ", false)->from('sz_RangosCompras AS RC ')
                    ->join('sz_Estilos AS E', 'RC.Estilo = E.ID', 'left')
                    ->where_in('RC.Estatus', array('ACTIVO'))
                    ->where_in('RC.ID', array($ID))
                    ->group_by(array('E.ID', 'E.Clave', 'E.Descripcion'));
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

    public function getRecordsByID($ID) {
        try {
            $this->db->select("RC.* ", false)->from('sz_RangosCompras AS RC ')
                    ->join('sz_Estilos AS E', 'RC.Estilo = E.ID', 'left')
                    ->where_in('RC.Estatus', array('ACTIVO'))
                    ->where_in('E.ID', array($ID))
                    ->order_by('RC.Talla', 'ASC');

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

    public function getMaterialesByFamilia($Familia) {
        try {
            return $this->db->select("U.ID, U.Material, U.Material+'-'+U.Descripcion AS Descripcion ", false)
                            ->from('sz_Materiales AS U')
                            ->join('sz_Catalogos AS F', 'F.ID = U.Familia', 'left')
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->where_in('F.IValue', $Familia)
                            ->where('U.Descripcion NOT LIKE \'%**CBZ**%\'', null, false)
                            ->order_by('F.IValue', 'ASC')
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstilo($Estilo) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false)
                    ->from('sz_RangosCompras AS FXE ')
                    ->where('FXE.Estilo', $Estilo);
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
            $this->db->where('ID', $ID)->update("sz_RangosCompras", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('Estilo', $ID)->update("sz_RangosCompras");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle($ID) {
        try {
            $this->db->where('ID', $ID)->delete("sz_RangosCompras");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionEstiloByIDEstilo($ID) {
        try {
            $this->db->select('U.Estilo, U.Fecha, U.Estatus', false)
                    ->from('sz_RangosCompras AS U')->where('U.Estilo', $ID)
                    ->where_in('U.Estatus', 'ACTIVO');
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
