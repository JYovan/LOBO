<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class piezasymateriales_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("PYM.ID
      ,E.Descripcion AS Estilo
      ,E.Descripcion AS Combinacion, CONCAT('<span class=\"badge badge-success\">$',CONVERT(varchar, CAST(SUM(PYMD.Consumo * PYMD.Precio) AS money), 1),'</span>')AS Total
      ,PYM.Registro AS Registro ", false);
            $this->db->from('PiezasYMateriales AS PYM ');
            $this->db->join('Estilos AS E', 'PYM.Estilo = E.ID');
            $this->db->join('Combinaciones AS C', 'PYM.Combinacion = C.ID');
            $this->db->join('PiezasYMaterialesDetalle AS PYMD', 'PYMD.PiezasYMateriales = PYM.ID');
            $this->db->group_by('PYM.ID,E.Descripcion,E.Descripcion,PYM.Registro');
            $this->db->where_in('PYM.Estatus', array('ACTIVO'));
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
            $this->db->select('M.[ID] AS ID,M.[Material] AS Material', false);
            $this->db->from('Materiales AS M');
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
    public function getUnidadPrecioTipoXMaterialID($ID) {
        try {
            $this->db->select('C.SValue AS UNIDAD, M.PrecioLista AS PRECIO, M.Tipo AS TIPO', false);
            $this->db->from('Materiales AS M');
            $this->db->join('Catalogos AS C', 'C.ID = M.UnidadConsumo');
            $this->db->where('M.ID', $ID);
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

    public function getPiezas() {
        try {
            $this->db->select('C.ID AS ID, C.SValue Pieza', false);
            $this->db->from('Catalogos AS C');
            $this->db->like('C.FieldId', 'PIEZAS');
            $this->db->like('C.Estatus', 'ACTIVO');
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

    public function onAgregar($array) {
        try {
            $this->db->insert("PiezasYMateriales", $array);
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
            $this->db->insert("PiezasYMaterialesDetalle", $array);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("PiezasYMateriales", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $DATA, $M) {
        try {
            $this->db->where('Material', $ID);
            $this->db->where('PiezasYMateriales', $M);
            $this->db->update("PiezasYMaterialesDetalle", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExisteMaterial($Material, $MaterialCombinacion) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('PiezasYMaterialesDetalle AS PYM ');
            $this->db->where('PYM.Material', $Material);
            $this->db->where('PYM.PiezasYMateriales', $MaterialCombinacion);
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

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("PiezasYMateriales");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleInactivo($ID,$M) {
        try { 
            $this->db->where('Estatus', 'INACTIVO'); 
            $this->db->where('PiezasYMateriales', $ID);
            $this->db->delete('PiezasYMaterialesDetalle');
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('PiezasYMateriales', $ID);
            $this->db->update("PiezasYMaterialesDetalle");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasYMaterialesByID($ID) {
        try {
            $this->db->select('M.ID AS ID, M.Estilo AS Estilo, M.Combinacion AS Combinacion', false);
            $this->db->from('PiezasYMateriales AS M');
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

    public function getPiezasYMaterialesDetalleByID($ID) {
        try {
            $this->db->select('PYMD.Material ID, M.Material AS Material,P.ID AS PIEZA_ID,  P.SValue AS Pieza,
                CONCAT(\'<strong><span class="text-warning">\',C.SValue,\'</span></strong>\') AS "U.M", 
                CONCAT(\'<strong><span class="text-primary">$\',CONVERT(varchar,CAST(M.PrecioLista AS money), 1),\'</span></strong>\') AS Precio, 
                 CONCAT(\'<strong><span class="text-danger">\',PYMD.[Consumo],\'</span></strong>\') AS Consumo,
	   CONCAT(\'<strong><span class="text-info">\',M.Tipo,\'</span></strong>\') AS Tipo,  
           CONCAT(\'<strong><span class="text-success">$\',CONVERT(varchar,CAST((M.PrecioLista * PYMD.Consumo) AS money), 1),\'</span></strong>\')  AS Importe', false);
            $this->db->from('PiezasYMaterialesDetalle AS PYMD ');
            $this->db->join('Materiales AS M', 'PYMD.Material = M.ID');
            $this->db->join('Catalogos AS C', 'M.UnidadConsumo = C.ID');
            $this->db->join('Catalogos AS P', 'PYMD.Pieza = P.ID');
            $this->db->like('C.FieldId', 'UNIDADES');
            $this->db->like('C.Estatus', 'ACTIVO');
            $this->db->like('P.FieldId', 'PIEZAS');
            $this->db->like('P.Estatus', 'ACTIVO');
            $this->db->where('PYMD.PiezasYMateriales', $ID);
            $this->db->where_in('PYMD.Estatus', 'ACTIVO');
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
            $this->db->select('C.ID AS ID, C.Descripcion AS Combinacion', false);
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
            $this->db->select('E.ID AS ID, E.Descripcion AS Estilo', false);
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
