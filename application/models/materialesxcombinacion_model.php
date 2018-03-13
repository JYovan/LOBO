<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class materialesxcombinacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("MXC.ID
      ,E.Descripcion AS ESTILO
      ,E.Descripcion AS COMBINACION, CONCAT('<span class=\"badge badge-success\">$',CONVERT(varchar, CAST(SUM(MXCD.Consumo * MXCD.Precio) AS money), 1),'</span>')AS TOTAL
      ,MXC.Registro AS REGISTRO ", false);
            $this->db->from('MaterialesXCombinacion AS MXC ');
            $this->db->join('Estilos AS E', 'MXC.Estilo = E.ID');
            $this->db->join('Combinaciones AS C', 'MXC.Combinacion = C.ID');
            $this->db->join('MaterialesXCombinacionDetalle AS MXCD', 'MXCD.MaterialXCombinacion = MXC.ID');
            $this->db->group_by('MXC.ID,E.Descripcion,E.Descripcion,MXC.Registro');
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
            $this->db->join('Catalogos AS C', 'M.UnidadConsumo = C.ID');
            $this->db->like('C.FieldId', 'UNIDADES');
            $this->db->like('C.Estatus', 'ACTIVO');
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

    public function onModificarDetalle($ID, $DATA, $M) {
        try {
            $this->db->where('Material', $ID);
            $this->db->where('MaterialXCombinacion', $M);
            $this->db->update("MaterialesXCombinacionDetalle", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExisteMaterial($MATERIAL, $MATERIALCOMBINACION) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('MaterialesXCombinacionDetalle AS MXC ');
            $this->db->where('MXC.Material', $MATERIAL);
            $this->db->where('MXC.MaterialXCombinacion', $MATERIALCOMBINACION);
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
            $this->db->update("MaterialesXCombinacion");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleInactivo($ID,$M) {
        try { 
            $this->db->where('Estatus', 'INACTIVO'); 
            $this->db->where('MaterialXCombinacion', $ID);
            $this->db->delete('MaterialesXCombinacionDetalle');
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('MaterialXCombinacion', $ID);
            $this->db->update("MaterialesXCombinacionDetalle");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesXCombinacionByID($ID) {
        try {
            $this->db->select('M.ID AS ID, M.Estilo AS ESTILO, M.Combinacion AS COMBINACION', false);
            $this->db->from('MaterialesXCombinacion AS M');
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

    public function getMaterialesXCombinacionDetalleByID($ID) {
        try {
            $this->db->select('MXCD.Material ID, M.Material AS MATERIAL, 
                C.SValue AS "U.M", 
                CONCAT(\'<strong><span class="text-primary">\',M.PrecioLista,\'</span></strong>\') AS PRECIO, 
                 CONCAT(\'<strong><span class="text-danger">\',MXCD.[Consumo],\'</span></strong>\') AS CONSUMO,
	   CONCAT(\'<strong><span class="text-info">\',(CASE 
	  WHEN MXCD.Tipo = 1 THEN
		\'DIR\'
		ELSE \'IND\' 
	  END),\'</span></strong>\') AS TIPO,  CONCAT(\'<strong><span class="text-success">\',(M.PrecioLista * MXCD.Consumo),\'</span></strong>\')  AS IMPORTE', false);
//            $this->db->select('CONCAT(\'<button type="button" class="btn btn-dark" id="btnEliminarMaterialE" onclick="onEliminarMaterial(this)">\',\'<span class="fa fa-minus"></span></button>\') AS ELIMINAR, MXCD.Material ID, M.Material AS MATERIAL, 
//                C.SValue AS "U.M", 
//                CONCAT(\'<strong><span class="text-primary">\',M.PrecioLista,\'</span></strong>\') AS PRECIO, 
//                 CONCAT(\'<strong><span class="text-danger">\',MXCD.[Consumo],\'</span></strong>\') AS CONSUMO,
//	   CONCAT(\'<strong><span class="text-info">\',(CASE 
//	  WHEN MXCD.Tipo = 1 THEN
//		\'DIR\'
//		ELSE \'IND\' 
//	  END),\'</span></strong>\') AS TIPO,  CONCAT(\'<strong><span class="text-success">\',(M.PrecioLista * MXCD.Consumo),\'</span></strong>\')  AS IMPORTE', false);
            $this->db->from('MaterialesXCombinacionDetalle AS MXCD ');
            $this->db->join('Materiales AS M', 'MXCD.Material = M.ID');
            $this->db->join('Catalogos AS C', 'M.UnidadConsumo = C.ID');
            $this->db->like('C.FieldId', 'UNIDADES');
            $this->db->like('C.Estatus', 'ACTIVO');
            $this->db->where('MXCD.MaterialXCombinacion', $ID);
            $this->db->where_in('MXCD.Estatus', 'ACTIVO');
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
