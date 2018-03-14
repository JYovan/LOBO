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
            $this->db->select("FXE.ID
      ,E.Descripcion AS Estilo,
      ,FXE.Registro AS Registro ", false);
            $this->db->from('FraccionesXEstilo AS FXE ');
            $this->db->join('Estilos AS E', 'FXE.Estilo = E.ID');
            $this->db->where_in('FXE.Estatus', array('ACTIVO'));
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

    public function getFraccionesXEstiloDetallebyFraccionesXEstilo($ID) {
        try {
            $this->db->select('FXED.ID,FXED.Orden,'
                    //Precio
                    . "(CASE WHEN ISNULL(FXED.Orden,0) = 0 THEN "
                    . "'<input type=''text'' id=''#Orden'' class=''form-control  '' onkeypress= ''validate(event,this.value);''  onpaste= ''return false;''  value='' '' onchange=''onModificarOrdenFraccionXEstilo(this.value,'+ REPLACE(LTRIM(REPLACE(FXED.ID, '0', ' ')), ' ', '0') +')'' />' "
                    . " ELSE "
                    . "'<input type=''text'' id=''#Orden'' class=''form-control  '' onkeypress= ''validate(event,this.value);''  onpaste= ''return false;''  value='' '+ CONVERT(VARCHAR(100),FXED.Orden) +' '' onchange=''onModificarOrdenFraccionXEstilo(this.value,'+ REPLACE(LTRIM(REPLACE(FXED.ID, '0', ' ')), ' ', '0') +')'' />'  "
                    . 'END) AS "Orden", '
                    . 'C.Descripcion AS "Fracción", '
                    //Precio
                    . "(CASE WHEN ISNULL(FXED.Precio,0) = 0 THEN "
                    . "'<input type=''text'' id=''#Precio'' class=''form-control  '' onkeypress= ''validate(event,this.value);''  onpaste= ''return false;''  value='' '' onchange=''onModificarPrecioFraccionXEstilo(this.value,'+ REPLACE(LTRIM(REPLACE(FXED.ID, '0', ' ')), ' ', '0') +')'' />' "
                    . " ELSE "
                    . "'<input type=''text'' id=''#Precio'' class=''form-control  '' onkeypress= ''validate(event,this.value);''  onpaste= ''return false;''  value='' '+ CONVERT(VARCHAR(100),FXED.Precio) +' '' onchange=''onModificarPrecioFraccionXEstilo(this.value,'+ REPLACE(LTRIM(REPLACE(FXED.ID, '0', ' ')), ' ', '0') +')'' />'  "
                    . 'END) AS "Precio",  '
                    //Precio
                    . "(CASE WHEN ISNULL(FXED.Cantidad,0) = 0 THEN "
                    . "'<input type=''text'' id=''#Cantidad'' class=''form-control  '' onkeypress= ''validate(event,this.value);''  onpaste= ''return false;''  value='' '' onchange=''onModificarCantidadFraccionXEstilo(this.value,'+ REPLACE(LTRIM(REPLACE(FXED.ID, '0', ' ')), ' ', '0') +')'' />' "
                    . " ELSE "
                    . "'<input type=''text'' id=''#Cantidad'' class=''form-control  '' onkeypress= ''validate(event,this.value);''  onpaste= ''return false;''  value='' '+ CONVERT(VARCHAR(100),FXED.Cantidad) +' '' onchange=''onModificarCantidadFraccionXEstilo(this.value,'+ REPLACE(LTRIM(REPLACE(FXED.ID, '0', ' ')), ' ', '0') +')'' />'  "
                    . 'END) AS "Cantidad",  
                        
              
                CONCAT(\'<strong><span class="text-success">$\',CONVERT(varchar, CAST((FXED.Cantidad * FXED.Precio) AS money), 1),\'</span></strong>\')  AS Importe ', false);
            $this->db->from('FraccionesXEstiloDetalle AS FXED ');
            $this->db->join('Fracciones AS C', 'FXED.Fraccion = C.ID');
            $this->db->like('C.Estatus', 'ACTIVO');
            $this->db->where('FXED.FraccionXEstilo', $ID);
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

    public function onAgregar($array) {
        try {
            $this->db->insert("FraccionesXEstilo", $array);
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
            $this->db->update("FraccionesXEstilo", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("FraccionesXEstilo");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFraccionXEstiloByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('FraccionesXEstilo AS U');
            $this->db->where('U.ID', $ID);
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
