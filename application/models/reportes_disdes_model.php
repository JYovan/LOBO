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
            $this->db->select(''
                    . 'L.Clave As ClaveLinea, L.Descripcion As DescLinea, '
                    . 'E.Clave AS ClaveEstilo, E.Descripcion As DescEstilo, E.Desperdicio AS Desperdicio, '
                    . 'C.ID AS ClaveCombinacion, C.Descripcion As DescCombinacion, '
                    . 'MAQ.Clave AS ClaveMaquila, MAQ.Nombre As NombreMaquila, '
                    . 'M.Material AS ClaveMaterial ,M.Descripcion AS DescMaterial,CATU.SValue AS Unidad,'
                    . 'M.PrecioLista AS Precio, PYMD.Consumo As Consumo, '
                    . '(M.PrecioLista * PYMD.Consumo) AS Costo, '
                    . '(M.PrecioLista * PYMD.Consumo) + ((M.PrecioLista * PYMD.Consumo) * E.Desperdicio ) AS UtlimaColumna, '
                    . 'P.Clave AS ClavePieza, P.Descripcion AS DescPieza,'
                    . 'CATF.SValue AS Familia, CATD.SValue AS Departamento'
                    . ' '
                    . ' ', false);
            $this->db->from('sz_Estilos AS E');
            $this->db->join('sz_PiezasYMateriales AS PYM', 'PYM.Estilo = E.ID');
            $this->db->join('sz_PiezasYMaterialesDetalle AS PYMD', 'PYMD.PiezasYMateriales =  PYM.ID');
            $this->db->join('sz_Lineas AS L', 'L.ID = E.Linea');
            $this->db->join('sz_Maquilas AS MAQ', 'MAQ.ID = E.Maquila');
            $this->db->join('sz_Combinaciones AS C', 'PYM.Combinacion =  C.ID');
            $this->db->join('sz_Materiales AS M', 'M.ID = PYMD.Material');
            $this->db->join('sz_Piezas AS P', 'P.ID = PYMD.Pieza');
            $this->db->join('sz_Catalogos CATU', "CATU.ID = M.UnidadConsumo AND CATU.FieldId = 'UNIDADES' ");
            $this->db->join('sz_Catalogos CATF', "CATF.ID = M.Familia AND CATF.FieldId = 'FAMILIAS' ");
            $this->db->join('sz_Catalogos CATD', "CATD.ID = P.DepartamentoCat AND CATD.FieldId = 'DEPARTAMENTOS' ");
            $this->db->where('PYM.Estilo', $Estilo);
            $this->db->where('PYM.Combinacion', $Combinacion);
            $this->db->order_by("CATD.IValue", "ASC");
            $this->db->order_by("M.Descripcion", "ASC");
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
    
    public function getCombinacionesXPiezaMaterial($Estilo){
        try {
            $this->db->select(''
                    . 'C.ID AS ID, C.Descripcion As Descripcion '
                    . ' ', false);
            $this->db->from('sz_PiezasYMateriales AS PYM');
            $this->db->join('sz_Combinaciones AS C', 'PYM.Combinacion =  C.ID');
            $this->db->where('PYM.Estilo', $Estilo);
            $this->db->order_by("C.Descripcion", "ASC");
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
