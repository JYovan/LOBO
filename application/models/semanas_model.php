<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class semanas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("U.Ano AS 'Año',U.Estatus  ", false);
            $this->db->from('sz_Semanas AS U');
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->group_by(array('U.Ano', 'U.Estatus'));
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

    public function onValidarExisteAno($Ano) {
        try {
            $this->db->select("COUNT(*) AS EXISTE", false)->from('sz_Semanas AS S');
            $this->db->where('S.Ano', $Ano);
            $this->db->where_in('S.Estatus', 'ACTIVO');
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
            $this->db->insert("sz_Semanas", $array);
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
            $this->db->update("sz_Semanas", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Semanas");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaNominaByAno($Ano) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Semanas AS U');
            $this->db->where('U.Ano', $Ano);
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

    public function getSemanasNominaByAno($Ano) {
        try {
            $this->db->select(""
                    . "CONCAT('<input type=''text'' id=''#Sem'' onkeypress= ''validate(event, this.value);'' class=''form-control form-control-sm numbersOnly'' onpaste= ''return false;''  value=''', U.Sem ,''' onchange=''onModificarSemanaXID(this.value,',U.ID ,')'' />') AS 'NoSem',  "
                    . "U.FechaIni AS 'FechaInicio', "
                    . "U.FechaFin AS 'FechaFin' "
                    . " ", false);
            $this->db->from('sz_Semanas AS U');
            $this->db->where('U.Ano', $Ano);
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
