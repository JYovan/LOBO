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
                    . 'C.Clave AS ClaveCombinacion, C.Descripcion As DescCombinacion, '
                    . 'MAQ.Clave AS ClaveMaquila, MAQ.Nombre As NombreMaquila, '
                    . 'M.Material AS ClaveMaterial ,M.Descripcion AS DescMaterial,M.UnidadConsumo AS Unidad,'
                    . 'M.PrecioLista AS Precio, PYMD.Consumo As Consumo, '
                    . '(M.PrecioLista * PYMD.Consumo) AS Costo, '
                    . '(M.PrecioLista * PYMD.Consumo) + ((M.PrecioLista * PYMD.Consumo) * E.Desperdicio ) AS UtlimaColumna, '
                    . 'CATP.IValue AS ClavePieza, CATP.SValue AS DescPieza,CATF.SValue AS Familia, CATD.SValue AS Departamento'
                    . ' '
                    . ' ', false);
            $this->db->from('Estilos AS E');
            $this->db->join('PiezasYMateriales AS PYM', 'PYM.Estilo = E.ID');
            $this->db->join('PiezasYMaterialesDetalle AS PYMD', 'PYMD.PiezasYMateriales =  PYM.ID');
            $this->db->join('Lineas AS L', 'L.ID = E.Linea');
            $this->db->join('Maquilas AS MAQ', 'MAQ.ID = E.Maquila');
            $this->db->join('Combinaciones AS C', 'PYM.Combinacion =  C.ID');
            $this->db->join('Materiales AS M', 'M.ID = PYMD.Material');
            $this->db->join('Catalogos CATF', "CATF.ID = M.Familia AND CATF.FieldId = 'FAMILIAS' ");
            $this->db->join('Catalogos CATD', "CATD.ID = M.Departamento AND CATD.FieldId = 'DEPARTAMENTOS' ");
            $this->db->join('Catalogos CATP', "CATP.ID = PYMD.Pieza AND CATP.FieldId = 'PIEZAS' ");
            $this->db->where('PYM.Estilo', $Estilo);
            $this->db->where('PYM.Combinacion', $Combinacion);
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

}
