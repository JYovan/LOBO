<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class reportes_disdes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getFichaTecnicaByEstiloByCombinacion($Estilo, $Combinacion) {
        try {
            $this->db->select('L.Clave As ClaveLinea, L.Descripcion As DescLinea, E.Clave AS ClaveEstilo, E.Descripcion As DescEstilo, E.Desperdicio AS Desperdicio, C.ID AS ClaveCombinacion, C.Descripcion As DescCombinacion, 
MAQ.Clave AS ClaveMaquila, MAQ.Nombre As NombreMaquila, M.Material AS ClaveMaterial, M.Descripcion AS DescMaterial, CATU.SValue AS Unidad, M.PrecioLista AS Precio, FT.Consumo As Consumo,
 (M.PrecioLista * FT.Consumo) AS Costo, (M.PrecioLista * FT.Consumo) + ((M.PrecioLista * FT.Consumo) * E.Desperdicio ) AS UtlimaColumna, P.Clave AS ClavePieza, 
 P.Descripcion AS DescPieza, CATF.SValue AS Familia, CATD.Descripcion AS Departamento', false)
                    ->from('sz_Estilos AS E')->join('sz_FichaTecnica AS FT', 'FT.Estilo = E.ID')
                    ->join('sz_Lineas AS L', 'L.ID = E.Linea')->join('sz_Maquilas AS MAQ', 'MAQ.ID = E.Maquila')
                    ->join('sz_Combinaciones AS C', 'FT.Combinacion =  C.ID')->join('sz_Materiales AS M', 'M.ID = FT.Material')
                    ->join('sz_Piezas AS P', 'P.ID = FT.Pieza')->join('sz_Catalogos CATU', "CATU.ID = M.UnidadConsumo AND CATU.FieldId = 'UNIDADES' ")
                    ->join('sz_Catalogos CATF', "CATF.ID = M.Familia AND CATF.FieldId = 'FAMILIAS' ")
                    ->join('sz_Departamentos CATD', "CATD.ID = P.DepartamentoCat ")
                    ->where('FT.Estilo', $Estilo)->where('FT.Combinacion', $Combinacion)
                    ->order_by("CATD.Descripcion", "ASC")->order_by("M.Descripcion", "ASC");
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
            $this->db->select("E.ID, E.Clave, E.Clave+'-'+E.Descripcion AS Descripcion ", false)->from('sz_Estilos AS E')
                    ->join('sz_FichaTecnica AS FT', 'FT.Estilo = E.ID')->where_in('E.Estatus', 'ACTIVO');
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

    public function getCombinacionesXEstilo($Estilo) {
        try {
            $this->db->select("C.ID AS ID, C.Clave+'-'+C.Descripcion As Descripcion ", false)
                    ->from('sz_FichaTecnica AS FT')->join('sz_Combinaciones AS C', 'FT.Combinacion =  C.ID', 'left')
                    ->join('sz_Estilos AS E', 'FT.Estilo = E.ID')->where('FT.Estilo', $Estilo)->order_by("C.Clave", "ASC");
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

}
