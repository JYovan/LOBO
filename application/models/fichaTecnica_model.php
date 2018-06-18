<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fichaTecnica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("FT.Estilo AS EstiloId, "
                    . "FT.Combinacion AS ColorId, "
                    . "E.Clave+'-'+E.Descripcion AS Estilo,"
                    . "C.Clave+'-'+C.Descripcion AS Color  ", false);
            $this->db->from('sz_FichaTecnica AS FT ');
            $this->db->join('sz_Estilos AS E', 'FT.Estilo = E.ID', 'left');
            $this->db->join('sz_Combinaciones AS C', 'FT.Combinacion = C.ID', 'left');
            $this->db->where_in('FT.Estatus', array('ACTIVO'));
            $this->db->group_by(array('FT.Estilo', 'FT.Combinacion', 'E.Clave', 'E.Descripcion', 'C.Clave', 'C.Descripcion'));
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
                CONCAT(\'<strong><span class="text-warning">\',C.SValue,\'</span></strong>\') AS "Unidad",
                CONCAT(\'<strong><span class="">$\',CONVERT(varchar,CAST(M.PrecioLista AS money), 1),\'</span></strong>\') AS Precio,
                CONCAT(\'<strong><span class="text-danger">\',FT.Consumo,\'</span></strong>\') AS Consumo,
                FT.TipoPiel As TipoPiel,
                ISNULL(FT.PzXPar,1) AS PzXPar,
           CONCAT(\'<strong><span class="text-success">$\',CONVERT(varchar,CAST((M.PrecioLista * FT.Consumo) AS money), 1),\'</span></strong>\')  AS Importe', false)
                            ->from('sz_FichaTecnica AS FT ')
                            ->join('sz_Materiales AS M', 'FT.Material = M.ID')
                            ->join('sz_Piezas AS P', 'FT.Pieza = P.ID')
                            ->join('sz_Catalogos AS C', 'M.UnidadConsumo = C.ID')
                            ->where('FT.Estilo', $Estilo)
                            ->where('FT.Combinacion', $Color)
                            ->where('FT.Estatus', 'ACTIVO')
//            $this->db->order_by('PYMD.ID', 'DESC');
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExisteEstiloCombinacion($Estilo, $Combinacion) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_FichaTecnica AS FT ');
            $this->db->where('FT.Estilo', $Estilo);
            $this->db->where('FT.Combinacion', $Combinacion);
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
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_FichaTecnica", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('Estilo', $ID);
            $this->db->update("sz_FichaTecnica");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_FichaTecnica");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFichaTecnicaByEstiloByCombinacion($Estilo, $Combinacion) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_FichaTecnica AS U');
            $this->db->where('U.Estilo', $Estilo);
            $this->db->where('U.Combinacion', $Combinacion);
            $this->db->where_in('U.Estatus', 'ACTIVO');
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
