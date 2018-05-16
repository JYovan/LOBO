<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Combinaciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('combinaciones_model');
        $this->load->model('estilos_model');
        $this->cm = $this->combinaciones_model;
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vCombinaciones');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getUltimaClave() {
        try {
            $Datos = $this->combinaciones_model->getUltimaClave($this->input->post('Estilo'));
            $Clave = $Datos[0]->Clave;
            if (empty($Clave)) {
                $Clave = 1;
            } else {
                $Clave = $Clave + 1;
            }

            print $Clave;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->cm->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionByID() {
        try {
            extract($this->input->post());
            $data = $this->combinaciones_model->getCombinacionByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getEstilos();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            /* AGREGAR EN SISTEMA LOBO */
            $x = $this->input;
            $data = array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL,
                'Estilo' => ($x->post('Estilo') !== NULL) ? $x->post('Estilo') : NULL
            );
            $ID = $this->combinaciones_model->onAgregar($data);

            /* AGREGAR A MAGNUS LOBO */
            $ClaveEstilo = $this->combinaciones_model->getClaveXEstilo($x->post('Estilo'))[0]->Clave;
            $ClaveFinal = $ClaveEstilo . $x->post('Clave');
            $data = array('IdProducto' => ($x->post('Clave') !== NULL) ? $ClaveFinal : ''
                , 'CodigoBarras' => ($x->post('Clave') !== NULL) ? $ClaveFinal : NULL
                , 'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL
                , 'DescripcionLarga' => $ClaveFinal . " " . $x->post('Descripcion')
                , 'TipoProducto' => 'T', 'TipoGrupo' => 'N'
                , 'IdTalla' => NULL, 'ClaveParteBase' => $ClaveFinal
                , 'ClaveParteTalla' => '', 'IdUnidad' => 1/* PAR */
                , 'Empaque' => 0.00, 'Peso' => 0.00
                , 'Volumen' => 0.00, 'ManejaLotes' => 'F'
                , 'TipoCosteo' => 'P', 'IdFamilia' => 1
                , 'IdGrupo' => 1, 'Caracteristica1' => NULL
                , 'Caracteristica2' => NULL, 'Caracteristica3' => NULL
                , 'Caracteristica4' => NULL, 'Caracteristica5' => NULL
                , 'Caracteristica6' => NULL, 'EnlaceSIMAC' => 0
                , 'RutaImagen' => '', 'IdClienteProveedor' => NULL
                , 'Empaqueint' => 0.00, 'CalcularPrecio' => 0
                , 'IdUnidadFactor' => 1, 'IdFactorConsumo' => 1
                , 'Alto' => 0.00, 'Ancho' => 0.00
                , 'Mascara' => NULL
            );
            $IDM = $this->combinaciones_model->onAgregarMagnus($data);

            /* MODIFICAR EN SISTEMA LOBO */
            $this->combinaciones_model->onModificar($ID, array('IdMagnus' => $IDM));

            /* OBTIENE LA CLAVE DEL PRODUCTO FK EN PRODUCTOS MAGNUS */
            $IDP = $this->combinaciones_model->getClaveFKXID($IDM)[0]->IDP;

            /* AGREGAR AL ALMACEN DE PT LOBO */
            $data = array('IdAlmacen' => 1/* PT */, 'IdProducto' => $IDP,
                'Estatus' => 'A', 'Ubicacion' => 'APT',
                'IdMoneda' => 1/* pesos mexicanos */,
                'Precio1' => 0.000000, 'Precio2' => 0.000000, 'Precio3' => 0.000000, 'Precio4' => 0.000000,
                'Precio5' => 0.000000, 'IdMargen' => 1/* MARGEN 1 */, 'PrecioBase' => 0.000000, 'IdImpuesto' => 1,
                'Existencias' => 0.0000, 'PendienteXSurtir' => 0.0000, 'PendienteXRecibir' => 0.0000, 'Apartados' => 0.0000,
                'CostoPromedio' => 0.0000, 'CostoUltimo' => 0.0000, 'TiempoSurtido' => 0, 'Reorden' => 0.0000,
                'StockMaximo' => 0.0000, 'StockMinimo' => 0.0000, 'CompraAnualMonto' => 0.0000, 'CompraAnualCantidad' => 0.0000,
                'VentaAnualMonto' => 0.0000, 'VentaAnualCantidad' => 0.0000,
                'CantidadFisica' => 0.0000, 'StatusCambio' => 'S', 'CantEnRenta' => 0.0000, 'CantidadFija' => 0.0000,
                'FechaToma' => NULL, 'UltimaCompra' => NULL, 'UltimaVenta' => NULL, 'Clasificacion' => 'B',
                'Bloqueo' => 0, 'CostoReposicion' => 0.0000, 'IdMonedaCostoReposicion' => 1
            );
            $this->combinaciones_model->onAgregarAlmacenMagnus($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            /* MODIFICAR EN SISTEMA LOBO */
            $DATA = array(
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );
            $this->combinaciones_model->onModificar($this->input->post('ID'), $DATA);

            /* MODIFICAR EN MAGNUS LOBO */
            $ClaveEstilo = $this->combinaciones_model->getClaveXEstilo($x->post('Estilo'))[0]->Clave;
            $ClaveFinal = $ClaveEstilo . $x->post('Clave');
            $data = array('CodigoBarras' => ($x->post('Clave') !== NULL) ? $ClaveFinal : NULL
                , 'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL
                , 'DescripcionLarga' => $ClaveFinal . " " . $x->post('Descripcion'), 'ClaveParteBase' => $ClaveFinal
            );
            $this->combinaciones_model->onModificarMagnus($this->combinaciones_model->getIdMagnus($x->post('ID'))[0]->IDM, $data);

            /* MODIFICAR ESTATUS EN PT MAGNUS LOBO */
            $this->combinaciones_model->onModificarAlmacenMagnus( 
            $this->combinaciones_model->getIdMagnus($x->post('ID'))[0]->IDM
                    , array('Estatus' => ($x->post('Estatus') === 'ACTIVO') ? 'A' : 'I'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->combinaciones_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
