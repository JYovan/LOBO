<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fichatecnica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("FT.Estilo AS EstiloId, "
                            . "FT.Combinacion AS ColorId, "
                            . "E.Clave+'-'+E.Descripcion AS Estilo,"
                            . "C.Clave+'-'+C.Descripcion AS Color  ", false)
                    ->from('sz_FichaTecnica AS FT ')
                    ->join('sz_Estilos AS E', 'FT.Estilo = E.ID', 'left')
                    ->join('sz_Combinaciones AS C', 'FT.Combinacion = C.ID', 'left')
                    ->where_in('FT.Estatus', array('ACTIVO'))
                    ->group_by(array('FT.Estilo', 'FT.Combinacion', 'E.Clave', 'E.Descripcion', 'C.Clave', 'C.Descripcion'));
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

    public function getFichaTecnicaDetalleByID($Estilo, $Color) {
        try {
            return $this->db->select('
                P.ID AS Pieza_ID,
                P.Clave+\'-\'+ P.Descripcion AS Pieza,
                FT.Material Material_ID,
                M.Material+\'-\'+M.Descripcion AS Material,
                CONCAT(\'<span class="text-warning">\',C.SValue,\'</span>\') AS "Unidad",
                CONCAT(\'$\',CONVERT(varchar,CAST(FT.Precio AS money), 1),\'\') AS Precio,
                CONCAT(\'\',FT.Consumo,\'\') AS Consumo,
                FT.TipoPiel As TipoPiel,
                ISNULL(FT.PzXPar,1) AS PzXPar,
           CONCAT(\'$\',CONVERT(varchar,CAST((FT.Precio * FT.Consumo) AS money), 1),\'\')  AS Importe, FT.ID AS ID,
           CONCAT(\'<span class="fa fa-trash fa-lg" onclick="onEliminarMaterialID(\',FT.ID,\')">\',\'</span>\') AS Eliminar, 
           CONCAT(D.Clave,\' - \',D.Descripcion) AS DeptoCat, D.Clave AS DEPTO', false)
                            ->from('sz_FichaTecnica AS FT ')
                            ->join('sz_Materiales AS M', 'FT.Material = M.ID')
                            ->join('sz_Piezas AS P', 'FT.Pieza = P.ID')
                            ->join('sz_Catalogos AS C', 'M.UnidadConsumo = C.ID')
                            ->join('sz_Departamentos AS D', 'P.DepartamentoCat = D.ID')
                            ->where('FT.Estilo', $Estilo)->where('FT.Combinacion', $Color)
                            ->where('FT.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstiloCombinacion($Estilo, $Combinacion) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false)->from('sz_FichaTecnica AS FT ')
                    ->where('FT.Estilo', $Estilo)->where('FT.Combinacion', $Combinacion);
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
            $this->db->insert("sz_FichaTecnica", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_FichaTecnica", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('Estilo', $ID)->update("sz_FichaTecnica");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle($ID) {
        try {
            $this->db->where('ID', $ID)->delete("sz_FichaTecnica");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaByEstiloByCombinacion($Estilo, $Combinacion) {
        try {
            $this->db->select('U.*', false)->from('sz_FichaTecnica AS U')
                    ->where('U.Estilo', $Estilo)->where('U.Combinacion', $Combinacion)
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

    public function getMaterialesRequeridos($Familia) {
        try {
            return $this->db->select("M.[ID] AS ID,M.Material+'-'+ M.Descripcion AS Material", false)->from('sz_Materiales AS M')->where_in('M.Estatus', array('ACTIVO'))->where_in('M.Familia', $Familia)->order_by("M.Material", "ASC")->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
