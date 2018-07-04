<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class fraccionesxestilo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("E.ID, E.Clave+'-'+E.Descripcion AS Estilo ", false);
            $this->db->from('sz_FraccionesEstilo AS FXE ');
            $this->db->join('sz_Estilos AS E', 'FXE.Estilo = E.ID', 'left');
            $this->db->where_in('FXE.Estatus', array('ACTIVO'));
            $this->db->group_by(array('E.ID', 'E.Clave', 'E.Descripcion'));
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

    public function getFraccionesEstiloXEstiloDetalle($ID) {
        try {
            $this->db->select(
                    //ID FRACCION_ESTILO
                    'FXED.ID,'
                    //IDFRACCION
                    . 'FXED.Fraccion AS FraccionID,'
                    //Departamento
                    . "CONCAT(CATD.Clave,' ',CATD.Descripcion) AS Departamento,"
                    //NombreFraccion
                    . 'C.Clave +\'-\'+ C.Descripcion AS Fraccion, '
                    //Maquina
                    . 'MAQ.Clave +\'-\'+ MAQ.Descripcion AS Maquina, '
                    //Puesto
                    . 'PU.Clave +\'-\'+ PU.Descripcion AS Puesto, '
                    //TiempoEstandar
                    . 'ISNULL(FXED.TiempoEstandarD,0) AS TiempoEstandar,'
                    //Eficiencia
                    . 'ISNULL(FXED.Eficiencia,0) AS Eficiencia,'
                    . "CONVERT(VARCHAR(25),ISNULL(FXED.Eficiencia,0)) + '%' AS Eficiencia,"
                    //TiempoReal
                    . 'ISNULL(FXED.TiempoReal,0) AS TiempoReal,'
                    //CostoFraccionManoObra
                    . " '$' + CONVERT(VARCHAR(25),ISNULL(FXED.CostoFraccionManoObra,0)) AS CostoMO,"
                    //CostoFraccionVentas
                    . " '$' + CONVERT(VARCHAR(25),ISNULL(FXED.CostoFraccionVentas,0)) AS CostoVTAS,"
                    //SueldoBase
                    . " '$' + CONVERT(VARCHAR(25),ISNULL(FXED.SueldoBase,0)) AS SueldoBase,"
                    //Eliminar
                    . "'<span class=''fa fa-times text-danger fa-lg'' onclick=''onEliminarRenglonDetalle('+ REPLACE(LTRIM(REPLACE(FXED.ID, '0', ' ')), ' ', '0') +')'' ></span>' AS Eliminar "
                    . ' ', false);
            $this->db->from('sz_FraccionesEstilo AS FXED ');
            $this->db->join('sz_Fracciones AS C', 'FXED.Fraccion = C.ID');
            $this->db->join('sz_Puestos AS PU', 'FXED.Puesto = PU.ID', 'LEFT');
            $this->db->join('sz_Maquinaria AS MAQ', 'FXED.Maquinaria = MAQ.ID', 'LEFT');
            $this->db->join('sz_Departamentos CATD', "CATD.ID = C.DepartamentoCat ", 'LEFT');
            $this->db->where('FXED.Estilo', $ID);
            //$this->db->order_by("CATD.Clave", "ASC");
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

    public function onComprobarExisteEstilo($Estilo) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_FraccionesEstilo AS FXE ');
            $this->db->where('FXE.Estilo', $Estilo);
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
            $this->db->insert("sz_FraccionesEstilo", $array);
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
            $this->db->update("sz_FraccionesEstilo", $DATA);
            //print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('Estilo', $ID);
            $this->db->update("sz_FraccionesEstilo");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_FraccionesEstilo");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionEstiloByIDEstilo($ID) {
        try {
            $this->db->select('U.Estilo, U.Fecha, U.TiempoEstandarE', false);
            $this->db->from('sz_FraccionesEstilo AS U');
            $this->db->where('U.Estilo', $ID);
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

}
