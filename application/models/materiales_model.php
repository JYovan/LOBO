<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class materiales_model extends CI_Model {

    public function __construct() {
        parent::__construct();
//        $this->dbi = $this->load->database('dbi', true);
    }

    public function getRecords() {
        try {
            return $this->db->select("U.ID,D.Clave+' '+D.Descripcion AS Departamento,CONVERT(VARCHAR(20),FAM.IValue)+' '+FAM.SValue AS Familia , U.Material, U.Descripcion", false)
                            ->from('sz_Materiales AS U')
                            ->join('sz_Departamentos AS D', 'U.Departamento = D.ID', 'left')
                            ->join('sz_Catalogos AS FAM', 'FAM.ID = U.Familia', 'left')
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMateriales() {
        try {
            return $this->db->select("U.ID, U.Material, U.Material+'-'+U.Descripcion AS Descripcion ", false)
                            ->from('sz_Materiales AS U')->where_in('U.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getLastOneMaterial() {
        try {
            return $this->db->select("TOP 1 M.Material", false)->from('sz_Materiales AS M')->order_by('M.ID', 'DESC')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialesByFamilia($Familia) {
        try {
            return $this->db->select("U.ID, U.Material, U.Material+'-'+U.Descripcion AS Descripcion ", false)
                            ->from('sz_Materiales AS U')
                            ->join('sz_Catalogos AS F', 'F.ID = U.Familia', 'left')
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->where_in('F.IValue', $Familia)
                            ->order_by('F.IValue', 'ASC')
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Materiales", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_Materiales", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarMagnus($ID, $DATA) {
        try {
            $this->db->where('Id', $ID);
            $this->db->update("Productos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Materiales");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialByID($ID) {
        try {
            return $this->db->select('U.*', false)
                            ->from('sz_Materiales AS U')
                            ->where('U.ID', $ID)
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrecioListaMaterial($ID) {
        try {
            return $this->db->select('U.PrecioLista AS Precio', false)
                            ->from('sz_Materiales AS U')
                            ->where('U.ID', $ID)
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarAlmacenMagnus($array) {
        try {
            $this->db->insert("Almacenproductos", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS ID');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['ID'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarMagnus($array) {
        try {
            $this->db->insert("Productos", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS ID');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['ID'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClaveFKXID($ID) {
        try {
            return $this->db->select('P.IdProducto AS IDP', false)->from('Productos AS P')->where('P.Id', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidadMagnusByID($IDX) {
        try {
            $this->db->select('C.IdMagnus AS IDM', false)->from('sz_Catalogos AS C')->where('C.ID', $IDX);
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
