<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materiales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('materiales_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vMateriales');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print $_GET['callback'] . '(' . json_encode($this->materiales_model->getRecords()) . ');'; /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialByID() {
        try {
            extract($this->input->post());
            $data = $this->materiales_model->getMaterialByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('DEPARTAMENTOS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFamilias() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('FAMILIAS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidades() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('UNIDADES');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Material' => ($this->input->post('Material') !== NULL) ? $this->input->post('Material') : NULL,
                'Departamento' => ($this->input->post('Departamento') !== NULL) ? $this->input->post('Departamento') : NULL,
                'Familia' => ($this->input->post('Familia') !== NULL) ? $this->input->post('Familia') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'UnidadCompra' => ($this->input->post('UnidadCompra') !== NULL) ? $this->input->post('UnidadCompra') : NULL,
                'UnidadConsumo' => ($this->input->post('UnidadConsumo') !== NULL) ? $this->input->post('UnidadConsumo') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'Minimo' => ($this->input->post('Minimo') !== NULL) ? $this->input->post('Minimo') : NULL,
                'Maximo' => ($this->input->post('Maximo') !== NULL) ? $this->input->post('Maximo') : NULL,
                'PrecioLista' => ($this->input->post('PrecioLista') !== NULL) ? $this->input->post('PrecioLista') : NULL,
                'PrecioTope' => ($this->input->post('PrecioTope') !== NULL) ? $this->input->post('PrecioTope') : NULL,
                'FechaUltimoInventario' => ($this->input->post('FechaUltimoInventario') !== NULL) ? $this->input->post('FechaUltimoInventario') : NULL,
                'Existencia' => ($this->input->post('Existencia') !== NULL) ? $this->input->post('Existencia') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $ID = $this->materiales_model->onAgregar($data);

            /* AGREGAR A MAGNUS LOBO */
            $ClaveFinal = $x->post('Material');
            $data = array('IdProducto' => ($x->post('Material') !== NULL) ? $ClaveFinal : ''
                , 'CodigoBarras' => ($x->post('Material') !== NULL) ? $ClaveFinal : NULL
                , 'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL
                , 'DescripcionLarga' => $ClaveFinal . " " . $x->post('Descripcion')
                , 'TipoProducto' => 'M', 'TipoGrupo' => 'N'
                , 'IdTalla' => NULL, 'ClaveParteBase' => $ClaveFinal
                , 'ClaveParteTalla' => '', 'IdUnidad' => 2/* PAR */
                , 'Empaque' => 0.00, 'Peso' => 0.00
                , 'Volumen' => 0.00, 'ManejaLotes' => 'F'
                , 'TipoCosteo' => 'P', 'IdFamilia' => 2
                , 'IdGrupo' => 1, 'Caracteristica1' => NULL
                , 'Caracteristica2' => NULL, 'Caracteristica3' => NULL
                , 'Caracteristica4' => NULL, 'Caracteristica5' => NULL
                , 'Caracteristica6' => NULL, 'EnlaceSIMAC' => 0
                , 'RutaImagen' => '', 'IdClienteProveedor' => NULL
                , 'Empaqueint' => 0.00, 'CalcularPrecio' => 0
                , 'IdUnidadFactor' => 2, 'IdFactorConsumo' => 2
                , 'Alto' => 0.00, 'Ancho' => 0.00
                , 'Mascara' => NULL
            );
            $IDM = $this->materiales_model->onAgregarMagnus($data);

            /* MODIFICAR EN SISTEMA LOBO */
            $this->materiales_model->onModificar($ID, array('IdMagnus' => $IDM));

            /* OBTIENE LA CLAVE DEL PRODUCTO FK EN PRODUCTOS MAGNUS */
            $IDP = $this->materiales_model->getClaveFKXID($IDM)[0]->IDP;

            /* AGREGAR AL ALMACEN DE PT LOBO */
            $data = array('IdAlmacen' => 2/* PM */, 'IdProducto' => $IDP,
                'Estatus' => 'A', 'Ubicacion' => 'APM',
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
            $this->materiales_model->onAgregarAlmacenMagnus($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $DATA = array(
                'Material' => ($x->post('Material') !== NULL) ? $x->post('Material') : NULL,
                'Departamento' => ($x->post('Departamento') !== NULL) ? $x->post('Departamento') : NULL,
                'Familia' => ($x->post('Familia') !== NULL) ? $x->post('Familia') : NULL,
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'UnidadCompra' => ($x->post('UnidadCompra') !== NULL) ? $x->post('UnidadCompra') : NULL,
                'UnidadConsumo' => ($x->post('UnidadConsumo') !== NULL) ? $x->post('UnidadConsumo') : NULL,
                'Tipo' => ($x->post('Tipo') !== NULL) ? $x->post('Tipo') : NULL,
                'Minimo' => ($x->post('Minimo') !== NULL) ? $x->post('Minimo') : NULL,
                'Maximo' => ($x->post('Maximo') !== NULL) ? $x->post('Maximo') : NULL,
                'PrecioLista' => ($x->post('PrecioLista') !== NULL) ? $x->post('PrecioLista') : NULL,
                'PrecioTope' => ($x->post('PrecioTope') !== NULL) ? $x->post('PrecioTope') : NULL,
                'FechaUltimoInventario' => ($x->post('FechaUltimoInventario') !== NULL) ? $x->post('FechaUltimoInventario') : NULL,
                'Existencia' => ($x->post('Existencia') !== NULL) ? $x->post('Existencia') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );
            $this->materiales_model->onModificar($x->post('ID'), $DATA);

            /* MODIFICAR EN MAGNUS */
            $ClaveFinal = $x->post('Material');
            $data = array(
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL
                , 'DescripcionLarga' => $ClaveFinal . " " . $x->post('Descripcion'),
                'ClaveParteBase' => $ClaveFinal
            );
            $this->materiales_model->onModificarMagnus($this->input->post('IdMagnus'), $this->input->post('IdMagnus'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->materiales_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
