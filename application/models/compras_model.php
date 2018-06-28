<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class compras_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getFamiliasExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano) {
        try {

            $this->db->select(""
                    . "CONVERT(VARCHAR(25),FAM.IValue)+' '+FAM.SValue AS Familia "
                    . "", false);
            $this->db->from('sz_FichaTecnica FT');
            $this->db->join('sz_Controles C', 'FT.Estilo = C.Estilo AND FT.Combinacion = C.Color', 'left');
            $this->db->join('sz_Materiales MT', 'FT.Material =  MT.ID', 'left');
            $this->db->join('sz_Catalogos UN', 'MT.UnidadCompra =  UN.ID', 'left');
            $this->db->join('sz_Catalogos FAM', 'MT.Familia =  FAM.ID', 'left');
            $this->db->where('C.Estatus', 'A');
            $this->db->where("ctMaq BETWEEN $dMaquila AND $aMaquila");
            $this->db->where("ctSem BETWEEN $dSemana AND $aSemana");
            $this->db->where('C.ctAno', $Ano);
            $this->db->where('C.Control IS NOT NULL', NULL, FALSE);
            switch ($TipoE) {
                case '1':
                    $this->db->where_in('FAM.IValue', array('1', '2'));
                    break;
                case '2':
                    $this->db->where_in('FAM.IValue', array('3'));
                    break;
                case '3':
                    $this->db->where_not_in('FAM.IValue', array('1', '2', '3'));
                    break;
            }
            $CamposAgrupados = array(
                'FAM.IValue',
                'FAM.SValue');
            $this->db->group_by($CamposAgrupados);
            $this->db->order_by('FAM.IValue', 'ASC');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            //print $str;
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExplosionInsumosByTipo($TipoE, $dMaquila, $aMaquila, $dSemana, $aSemana, $Ano) {
        try {
            $Grupo;


            $this->db->select("MT.ID as idMat,"
                    . "CONVERT(VARCHAR(25),FAM.IValue)+' '+FAM.SValue AS Familia,"
                    . "MT.Material AS ClaveArticulo,"
                    . "MT.Descripcion AS Articulo,"
                    . "UN.SValue AS Unidad,"
                    . "FT.Consumo* SUM (C.Pares) AS Explosion,"
                    . "FT.Precio,"
                    . "(FT.Precio* FT.Consumo) * SUM (C.Pares) AS Subtotal"
                    . "", false);
            $this->db->from('sz_FichaTecnica FT');
            $this->db->join('sz_Controles C', 'FT.Estilo = C.Estilo AND FT.Combinacion = C.Color', 'left');
            $this->db->join('sz_Materiales MT', 'FT.Material =  MT.ID', 'left');
            $this->db->join('sz_Catalogos UN', 'MT.UnidadCompra =  UN.ID', 'left');
            $this->db->join('sz_Catalogos FAM', 'MT.Familia =  FAM.ID', 'left');
            $this->db->where('C.Estatus', 'A');
            $this->db->where("ctMaq BETWEEN $dMaquila AND $aMaquila");
            $this->db->where("ctSem BETWEEN $dSemana AND $aSemana");
            $this->db->where('C.ctAno', $Ano);
            $this->db->where('C.Control IS NOT NULL', NULL, FALSE);
            switch ($TipoE) {
                case '1':
                    $this->db->where_in('FAM.IValue', array('1', '2'));
                    break;
                case '2':
                    $this->db->where_in('FAM.IValue', array('3'));
                    break;
                case '3':
                    $this->db->where_not_in('FAM.IValue', array('1', '2', '3'));
                    break;
            }
            $CamposAgrupados = array(
                'MT.ID',
                'FAM.IValue',
                'FAM.SValue',
                'Mt.Material',
                'Mt.Descripcion',
                'UN.SValue',
                'FT.Precio',
                'FT.Consumo');
            $this->db->group_by($CamposAgrupados);
            $this->db->order_by('FAM.IValue', 'ASC');
            $this->db->order_by('MT.Material', 'ASC');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            //print $str;
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
