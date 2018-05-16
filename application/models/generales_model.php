<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class generales_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($FieldId) {
        try {
            return $this->db->select("U.ID ,U.IValue AS Clave, U.SValue AS Nombre,U.Valor_Text AS Descripción, U.Valor_Num AS Valor, U.Estatus AS Estatus ", false)->from('sz_Catalogos AS U')->where_in('U.FieldId', $FieldId)->where_in('U.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Catalogos", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarUnidadMagnus($array) {
        try {
            $this->db->insert("Unidades", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n"; 
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarUnidadFactorMagnus($array) {
        try {
            $this->db->insert("UnidadesFactor", $array);
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
            $this->db->where('ID', $ID)->update("sz_Catalogos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarUnidadMagnus($ID, $DATA) {
        try {
            $this->db->where('IdUnidad', $ID)->update("Unidades", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarUnidadFactorMagnus($ID, $DATA) {
        try {
            $this->db->where('IdUnidad', $ID)->update("UnidadesFactor", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Catalogos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCatalogoByID($ID) {
        try {
            $this->db->select('C.*, UF.Factor AS Factor', false)->from('sz_Catalogos AS C');
            $this->db->join('Unidades AS U', 'C.IdMagnus = U.IdUnidad', 'left')->join('UnidadesFactor AS UF', 'U.IdUnidad = UF.IdUnidad', 'left');
            $this->db->where('C.ID', $ID)->where_in('C.Estatus', 'ACTIVO');
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

    public function getUltimaUnidad() {
        try {
            return $this->db->select('MAX(U.IdUnidad)+1 AS MU', false)->from('Unidades AS U')->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getIdMagnusUnidadFactor($IdUnidad) {
        try {
            return $this->db->select('MAX(U.IdUnidad)+1 AS MU', false)->from('Unidades AS U')->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCatalogosByFielID($FieldId) {
        try {
            $this->db->select('U.ID, CONVERT(varchar(10), U.IValue)+\'-\'+U.SValue AS SValue', false);
            $this->db->from('sz_Catalogos AS U');
            $this->db->where('U.FieldId', $FieldId);
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->order_by("U.IValue", "ASC");
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

    public function getCatalogosDescripcionByFielID($FieldId) {
        try {
            $this->db->select('U.ID, CONVERT(varchar(10), U.IValue)+\'-\'+U.SValue+\'-\'+U.Valor_Text AS SValue', false);
            $this->db->from('sz_Catalogos AS U');
            $this->db->where('U.FieldId', $FieldId);
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->order_by("U.IValue", "ASC");
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
