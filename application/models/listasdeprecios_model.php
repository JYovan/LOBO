<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class listasdeprecios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("LDP.ID AS ID, LDP.Descripcion AS \"DESCRIPCIÓN\", "
                    . "(SELECT COUNT(*) FROM sz_ListaDePreciosDetalle AS LDPD "
                    . "WHERE LDPD.Lista = LDP.ID) AS \"PRODUCTOS EN LA LISTA\", "
                    . "LDP.Estatus AS ESTATUS", false);
            $this->db->from('sz_ListaDePrecios AS LDP');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
//            PRINT $str;
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioListaByEstiloByCliente($Estilo, $Cliente) {
        try {
            $this->db->select("LDPD.Precio", false);
            $this->db->from('sz_ListaDePreciosDetalle AS LDPD');
            $this->db->join('sz_ListaDePrecios AS LDP', 'LDP.ID = LDPD.Lista');
            $this->db->join('sz_Clientes AS CT', 'CT.ListaDePrecios = LDP.ID');
            $this->db->where('LDPD.Estilo', $Estilo);
            $this->db->where('CT.ID', $Cliente);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getListaByID($ID) {
        try {
            $this->db->select("LDP.ID AS IDE, LDP.Descripcion AS \"DESCRIPCIÓN\", LDP.Estatus AS ESTATUS", false);
            $this->db->from('sz_ListaDePrecios AS LDP');
            $this->db->where('LDP.ID', $ID);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getListaDetalleByID($ID) {
        try {
            $this->db->select("LDPD.ID AS ID, E.ID AS ID_ESTILO, CONCAT(E.Clave,'-',E.Descripcion) AS ESTILO, LDPD.Precio AS PRECIO", false);
            $this->db->from('sz_ListaDePrecios AS LDP');
            $this->db->join('sz_ListaDePreciosDetalle AS LDPD', 'LDP.ID = LDPD.Lista');
            $this->db->join('sz_Estilos AS E', 'E.ID = LDPD.Estilo');
            $this->db->where('LDP.ID', $ID);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            $this->db->select("E.ID AS ID, CONCAT(E.Clave,'-',E.Descripcion) AS Estilo ", false);
            $this->db->from('sz_Estilos AS E');
            $this->db->where('E.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_ListaDePrecios", $array);
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
            $this->db->insert("sz_ListaDePreciosDetalle", $array);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_ListaDePrecios");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID, $Lista) {
        try {
            $this->db->where('ID', $ID);
            $this->db->where('Lista', $Lista);
            $this->db->delete("sz_ListaDePreciosDetalle");
            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_ListaDePrecios", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
