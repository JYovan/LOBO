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
            return $this->db->select("PYM.ID
      ,E.Clave+'-'+E.Descripcion AS Estilo
      ,C.Clave+'-'+C.Descripcion AS Combinacion
      ,'<strong>$'+CONVERT(varchar, CAST(SUM(PYMD.Consumo * PYMD.Precio) AS money), 1)+'</strong>' AS Importe,
     ,PYM.Registro AS Registro ", false)->from('sz_PiezasYMateriales AS PYM ')
                            ->join('sz_Estilos AS E', 'PYM.Estilo = E.ID', 'left')->join('sz_Combinaciones AS C', 'PYM.Combinacion = C.ID', 'left')
                            ->join('sz_PiezasYMaterialesDetalle AS PYMD', 'PYMD.PiezasYMateriales = PYM.ID', 'left')
                            ->group_by('PYM.ID,E.Clave,E.Descripcion,C.Clave,C.Descripcion,PYM.Registro')->where_in('PYM.Estatus', array('ACTIVO'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarEstiloXCombinacion($ID, $E, $C) {
        try {
            $this->db->select("COUNT(*) AS EXISTE", false)->from('sz_PiezasYMateriales AS PYM');
            if ($ID !== '' && $ID !== '0') {
                $this->db->where('PYM.ID <>' . $ID, null, false);
            }
            if ($E !== '') {
                $this->db->where('PYM.Estilo', $E);
            }
            if ($C !== '') {
                $this->db->where('PYM.Combinacion', $C);
            }
            return $this->db->where_in('PYM.Estatus', array('ACTIVO'))->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesRequeridos($Familia) {
        try {
            return $this->db->select("M.[ID] AS ID,M.Material+'-'+ M.Descripcion AS Material", false)->from('sz_Materiales AS M')->where_in('M.Estatus', array('ACTIVO'))->where_in('M.Familia', $Familia)->order_by("M.Material", "ASC")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidadPrecioTipoXMaterialID($ID) {
        try {
            return $this->db->select('C.SValue AS UNIDAD, M.PrecioLista AS PRECIO, M.Tipo AS TIPO', false)
                            ->from('sz_Materiales AS M')
                            ->join('sz_Catalogos AS C', 'C.ID = M.UnidadConsumo')
                            ->where('M.ID', $ID)
                            ->where_in('M.Estatus', array('ACTIVO'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezas() {
        try {
            return $this->db->select("U.ID, U.Clave+'-'+ U.Descripcion AS Pieza", false)
                            ->from('sz_Piezas AS U')
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->get()
                            ->result();
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
            $this->db->where('ID', $ID)->update("sz_PiezasYMateriales", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $Pieza, $DATA, $M) {
        try {
            $this->db->where('Material', $ID)->where('Pieza', $Pieza)->where('PiezasYMateriales', $M)
                    ->update("sz_PiezasYMaterialesDetalle", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExisteMaterial($Material, $Pieza, $MaterialCombinacion) {
        try {
            return $this->db->select('COUNT(*) AS EXISTE', false)
                            ->from('sz_PiezasYMaterialesDetalle AS PYM ')
                            ->where('PYM.Material', $Material)
                            ->where('PYM.Pieza', $Pieza)
                            ->where('PYM.PiezasYMateriales', $MaterialCombinacion)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->where('ID', $ID)->delete('sz_PiezasYMateriales')->where('PiezasYMateriales', $ID)->delete('sz_PiezasYMaterialesDetalle');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalleInactivo($ID, $M) {
        try {
            $this->db->where('Estatus', 'INACTIVO')->where('PiezasYMateriales', $ID)->delete('sz_PiezasYMaterialesDetalle');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')
                    ->where('PiezasYMateriales', $ID)
                    ->update("sz_PiezasYMaterialesDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasYMaterialesByID($ID) {
        try {
            return $this->db->select('M.ID AS ID, M.Estilo AS Estilo, M.Combinacion AS Combinacion', false)
                            ->from('sz_PiezasYMateriales AS M')
                            ->where('M.ID', $ID)
                            ->where_in('M.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasYMaterialesDetalleByID($ID) {
        try {
            return $this->db->select('P.ID AS PIEZA_ID,
                P.Clave+\'-\'+ P.Descripcion AS Pieza,
                PYMD.Material ID, M.Material+\'-\'+M.Descripcion AS Material,
                CONCAT(\'<strong><span class="text-warning">\',C.SValue,\'</span></strong>\') AS "U.M",
                CONCAT(\'<strong><span class="">$\',CONVERT(varchar,CAST(M.PrecioLista AS money), 1),\'</span></strong>\') AS Precio,
                 CONCAT(\'<strong><span class="text-danger">\',PYMD.[Consumo],\'</span></strong>\') AS Consumo,
                 PYMD.PzXPar AS PzXPar,
           CONCAT(\'<strong><span class="text-success">$\',CONVERT(varchar,CAST((M.PrecioLista * PYMD.Consumo) AS money), 1),\'</span></strong>\')  AS Importe', false)
                            ->from('sz_PiezasYMaterialesDetalle AS PYMD ')
                            ->join('sz_Materiales AS M', 'PYMD.Material = M.ID')
                            ->join('sz_Piezas AS P', 'PYMD.Pieza = P.ID')
                            ->join('sz_Catalogos AS C', 'M.UnidadConsumo = C.ID')
                            ->like('C.FieldId', 'UNIDADES')
                            ->like('C.Estatus', 'ACTIVO')
                            ->where('PYMD.PiezasYMateriales', $ID)
                            ->where_in('PYMD.Estatus', 'ACTIVO')
//            $this->db->order_by('PYMD.ID', 'DESC');
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPiezasMatFichaTecnicaXEstiloXCombinacion($Estilo, $Color) {
        try {
            return $this->db->select('P.ID AS PIEZA_ID,  P.Clave+\'-\'+ P.Descripcion AS Pieza,
                M.Material+\'-\'+M.Descripcion AS Material,
                CONCAT(\'<strong><span class="text-warning">\',C.SValue,\'</span></strong>\') AS "U.M",
                CONCAT(\'<strong><span class="">$\',CONVERT(varchar,CAST(M.PrecioLista AS money), 1),\'</span></strong>\') AS Precio,
                 CONCAT(\'<strong><span class="text-danger">\',PYMD.[Consumo],\'</span></strong>\') AS Consumo,
           CONCAT(\'<strong><span class="text-success">$\',CONVERT(varchar,CAST((M.PrecioLista * PYMD.Consumo) AS money), 1),\'</span></strong>\')  AS Importe,
          CONCAT(DEP.IValue,\'-\',DEP.SValue) AS "Depto"', false)
                            ->from('sz_PiezasYMaterialesDetalle AS PYMD ')
                            ->join('sz_PiezasYMateriales AS PM', 'PYMD.PiezasYMateriales = PM.ID')
                            ->join('sz_Materiales AS M', 'PYMD.Material = M.ID')
                            ->join('sz_Piezas AS P', 'PYMD.Pieza = P.ID')
                            ->join('sz_Catalogos AS C', 'M.UnidadConsumo = C.ID')
                            ->like('C.FieldId', 'UNIDADES')
                            ->like('C.Estatus', 'ACTIVO')
                            ->join('sz_Catalogos AS DEP', 'P.DepartamentoCat = DEP.ID')
                            ->like('DEP.FieldId', 'DEPARTAMENTOS')
                            ->like('C.Estatus', 'ACTIVO')
                            ->where('PM.Estilo', $Estilo)
                            ->where('PM.Combinacion', $Color)
                            ->where_in('PYMD.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinaciones() {
        try {
            return $this->db->select('C.ID AS ID, C.Descripcion AS Combinacion', false)
                            ->from('sz_Combinaciones AS C')
                            ->where_in('C.Estatus', array('ACTIVO'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            return $this->db->select('E.ID AS ID, E.Descripcion AS Estilo', false)
                            ->from('sz_Estilos AS E')->where_in('E.Estatus', array('ACTIVO'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
