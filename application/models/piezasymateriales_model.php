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
      ,E.Clave+'-'+E.Descripcion AS Estilo
      ,C.Clave+'-'+C.Descripcion AS Combinacion
      ,'<strong>$'+CONVERT(varchar, CAST(SUM(PYMD.Consumo * PYMD.Precio) AS money), 1)+'</strong>' AS Importe,
     ,PYM.Registro AS Registro ", false);
            $this->db->from('sz_PiezasYMateriales AS PYM ');
            $this->db->join('sz_Estilos AS E', 'PYM.Estilo = E.ID', 'left');
            $this->db->join('sz_Combinaciones AS C', 'PYM.Combinacion = C.ID', 'left');
            $this->db->join('sz_PiezasYMaterialesDetalle AS PYMD', 'PYMD.PiezasYMateriales = PYM.ID', 'left');
            $this->db->group_by('PYM.ID,E.Clave,E.Descripcion,C.Clave,C.Descripcion,PYM.Registro');
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

    public function onComprobarEstiloXCombinacion($ID, $E, $C) {
        try {
            $this->db->select("COUNT(*) AS EXISTE", false);
            $this->db->from('sz_PiezasYMateriales AS PYM');
            if ($ID !== '' && $ID !== '0') {
                $this->db->where('PYM.ID <>' . $ID, null, false);
            }
            if ($E !== '') {
                $this->db->where('PYM.Estilo', $E);
            }
            if ($C !== '') {
                $this->db->where('PYM.Combinacion', $C);
            }
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

    public function getMaterialesRequeridos($Familia) {
        try {
            $this->db->select("M.[ID] AS ID,M.Material+'-'+ M.Descripcion AS Material", false);
            $this->db->from('sz_Materiales AS M');
            //$this->db->like('M.Descripcion', $Descripcion);
            $this->db->where_in('M.Estatus', array('ACTIVO'));
            $this->db->where_in('M.Familia', $Familia);
            $this->db->order_by("M.Material", "ASC");
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

    public function getUnidadPrecioTipoXMaterialID($ID) {
        try {
            $this->db->select('C.SValue AS UNIDAD, M.PrecioLista AS PRECIO, M.Tipo AS TIPO', false);
            $this->db->from('sz_Materiales AS M');
            $this->db->join('sz_Catalogos AS C', 'C.ID = M.UnidadConsumo');
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
            $this->db->select("U.ID, U.Clave+'-'+ U.Descripcion AS Pieza", false);
            $this->db->from('sz_Piezas AS U');
            $this->db->where_in('U.Estatus', 'ACTIVO');
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

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_PiezasYMateriales", $array);
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
            $this->db->insert("sz_PiezasYMaterialesDetalle", $array);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_PiezasYMateriales", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $Pieza, $DATA, $M) {
        try {
            $this->db->where('Material', $ID);
            $this->db->where('Pieza', $Pieza);
            $this->db->where('PiezasYMateriales', $M);
            $this->db->update("sz_PiezasYMaterialesDetalle", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExisteMaterial($Material, $Pieza, $MaterialCombinacion) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_PiezasYMaterialesDetalle AS PYM ');
            $this->db->where('PYM.Material', $Material);
            $this->db->where('PYM.Pieza', $Pieza);
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
            /* ELIMINACION DEFINITIVA */
            $this->db->where('ID', $ID);
            $this->db->delete('sz_PiezasYMateriales');

            $this->db->where('PiezasYMateriales', $ID);
            $this->db->delete('sz_PiezasYMaterialesDetalle');
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleInactivo($ID, $M) {
        try {
            $this->db->where('Estatus', 'INACTIVO');
            $this->db->where('PiezasYMateriales', $ID);
            $this->db->delete('sz_PiezasYMaterialesDetalle');
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('PiezasYMateriales', $ID);
            $this->db->update("sz_PiezasYMaterialesDetalle");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasYMaterialesByID($ID) {
        try {
            $this->db->select('M.ID AS ID, M.Estilo AS Estilo, M.Combinacion AS Combinacion', false);
            $this->db->from('sz_PiezasYMateriales AS M');
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
            $this->db->select('P.ID AS PIEZA_ID,  P.Clave+\'-\'+ P.Descripcion AS Pieza,
                PYMD.Material ID, M.Material+\'-\'+M.Descripcion AS Material,
                CONCAT(\'<strong><span class="text-warning">\',C.SValue,\'</span></strong>\') AS "U.M",
                CONCAT(\'<strong><span class="text-primary">$\',CONVERT(varchar,CAST(M.PrecioLista AS money), 1),\'</span></strong>\') AS Precio,
                 CONCAT(\'<strong><span class="text-danger">\',PYMD.[Consumo],\'</span></strong>\') AS Consumo,
           CONCAT(\'<strong><span class="text-success">$\',CONVERT(varchar,CAST((M.PrecioLista * PYMD.Consumo) AS money), 1),\'</span></strong>\')  AS Importe', false);
            $this->db->from('sz_PiezasYMaterialesDetalle AS PYMD ');
            $this->db->join('sz_Materiales AS M', 'PYMD.Material = M.ID');
            $this->db->join('sz_Piezas AS P', 'PYMD.Pieza = P.ID');
            $this->db->join('sz_Catalogos AS C', 'M.UnidadConsumo = C.ID');
            $this->db->like('C.FieldId', 'UNIDADES');
            $this->db->like('C.Estatus', 'ACTIVO');
            $this->db->where('PYMD.PiezasYMateriales', $ID);
            $this->db->where_in('PYMD.Estatus', 'ACTIVO');
//            $this->db->order_by('PYMD.ID', 'DESC');
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
            $this->db->from('sz_Combinaciones AS C');
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
            $this->db->from('sz_Estilos AS E');
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
