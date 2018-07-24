<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cabeceras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('cabeceras_model');
        $this->load->model('departamentos_model');
        $this->load->model('generales_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vCabeceras');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print $_GET['callback'] . '(' . json_encode($this->cabeceras_model->getRecords()) . ');'; /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getComponentesRangosDetalle() {
        try {
            print json_encode($this->cabeceras_model->getComponentesRangosDetalle($this->input->post('Cabecera')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaterialByID() {
        try {
            print json_encode($this->cabeceras_model->getMaterialByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDepartamentos() {
        try {
            print json_encode($this->departamentos_model->getDepartamentos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFamilias() {
        try {
            print json_encode($this->generales_model->getCatalogosByFielID('FAMILIAS'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUnidades() {
        try {
            print json_encode($this->generales_model->getCatalogosByFielID('UNIDADES'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUltimaClave() {
        try {
            print json_encode($this->cabeceras_model->getUltimaClave());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
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
            $ID = $this->cabeceras_model->onAgregar($data);

            /* AGREGAR A MAGNUS LOBO */
            $ClaveFinal = $x->post('Material');
            $IDMU = $this->cabeceras_model->getUnidadMagnusByID($x->post('UnidadCompra'))[0]->IDM;
            $data = array('IdProducto' => ($x->post('Material') !== NULL) ? $ClaveFinal . '-M' : ''
                , 'CodigoBarras' => ($x->post('Material') !== NULL) ? $ClaveFinal . '-M' : NULL
                , 'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL
                , 'DescripcionLarga' => $ClaveFinal . " " . $x->post('Descripcion')
                , 'TipoProducto' => 'M', 'TipoGrupo' => 'N'
                , 'IdTalla' => NULL, 'ClaveParteBase' => $ClaveFinal
                , 'ClaveParteTalla' => ''
                , 'IdUnidad' => ($IDMU !== NULL) ? $IDMU : 19/* SE CAMBIO DE PAR A LA UNIDAD ESTABLECIDA EN MAGNUS */
                , 'Empaque' => 0.00, 'Peso' => 0.00
                , 'Volumen' => 0.00, 'ManejaLotes' => 'F'
                , 'TipoCosteo' => 'P', 'IdFamilia' => 2/* FAMILIA PARA MATERIA PRIMA */
                , 'IdGrupo' => 1, 'Caracteristica1' => NULL
                , 'Caracteristica2' => NULL, 'Caracteristica3' => NULL
                , 'Caracteristica4' => NULL, 'Caracteristica5' => NULL
                , 'Caracteristica6' => NULL, 'EnlaceSIMAC' => 0
                , 'RutaImagen' => '', 'IdClienteProveedor' => NULL
                , 'Empaqueint' => 0.00, 'CalcularPrecio' => 0
                , 'IdUnidadFactor' => 2, 'IdFactorConsumo' => 2 /* SE COLOCA DOS PARA DIFERENCIAR ENTRE PT Y MT */
                , 'Alto' => 0.00, 'Ancho' => 0.00
                , 'Mascara' => NULL
            );
            $IDM = $this->cabeceras_model->onAgregarMagnus($data);

            /* MODIFICAR EN SISTEMA LOBO */
            $this->cabeceras_model->onModificar($ID, array('IdMagnus' => $IDM));

            /* OBTIENE LA CLAVE DEL PRODUCTO FK EN PRODUCTOS MAGNUS */
            $IDP = $this->cabeceras_model->getClaveFKXID($IDM)[0]->IDP;

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
            $this->cabeceras_model->onAgregarAlmacenMagnus($data);
            $JSON = '{ "ID":' . $ID . ', "IDM":' . $IDM . '}';
            print $JSON;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarComponente() {
        try {
            $x = $this->input;
            $data = array(
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
                'Talla' => ($x->post('Talla') !== NULL) ? $x->post('Talla') : NULL,
                'Cabecera' => ($x->post('Cabecera') !== NULL) ? $x->post('Cabecera') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );

            $ID = $this->cabeceras_model->onAgregar($data);

            /* AGREGAR A MAGNUS LOBO */
            $ClaveFinal = $x->post('Material');
            $IDMU = $this->cabeceras_model->getUnidadMagnusByID($x->post('UnidadCompra'))[0]->IDM;
            $data = array('IdProducto' => ($x->post('Material') !== NULL) ? $ClaveFinal . '-M' : ''
                , 'CodigoBarras' => ($x->post('Material') !== NULL) ? $ClaveFinal . '-M' : NULL
                , 'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL
                , 'DescripcionLarga' => $ClaveFinal . " " . $x->post('Descripcion')
                , 'TipoProducto' => 'M', 'TipoGrupo' => 'N'
                , 'IdTalla' => NULL, 'ClaveParteBase' => $ClaveFinal
                , 'ClaveParteTalla' => ''
                , 'IdUnidad' => ($IDMU !== NULL) ? $IDMU : 19/* SE CAMBIO DE PAR A LA UNIDAD ESTABLECIDA EN MAGNUS */
                , 'Empaque' => 0.00, 'Peso' => 0.00
                , 'Volumen' => 0.00, 'ManejaLotes' => 'F'
                , 'TipoCosteo' => 'P', 'IdFamilia' => 2/* FAMILIA PARA MATERIA PRIMA */
                , 'IdGrupo' => 1, 'Caracteristica1' => NULL
                , 'Caracteristica2' => NULL, 'Caracteristica3' => NULL
                , 'Caracteristica4' => NULL, 'Caracteristica5' => NULL
                , 'Caracteristica6' => NULL, 'EnlaceSIMAC' => 0
                , 'RutaImagen' => '', 'IdClienteProveedor' => NULL
                , 'Empaqueint' => 0.00, 'CalcularPrecio' => 0
                , 'IdUnidadFactor' => ($IDMU !== NULL) ? $IDMU : 19, 'IdFactorConsumo' => ($IDMU !== NULL) ? $IDMU : 19 /* SE COLOCA DOS PARA DIFERENCIAR ENTRE PT Y MT */
                , 'Alto' => 0.00, 'Ancho' => 0.00
                , 'Mascara' => NULL
            );
            $IDM = $this->cabeceras_model->onAgregarMagnus($data);

            /* MODIFICAR EN SISTEMA LOBO */
            $this->cabeceras_model->onModificar($ID, array('IdMagnus' => $IDM));

            /* OBTIENE LA CLAVE DEL PRODUCTO FK EN PRODUCTOS MAGNUS */
            $IDP = $this->cabeceras_model->getClaveFKXID($IDM)[0]->IDP;

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
            $this->cabeceras_model->onAgregarAlmacenMagnus($data);
            //$JSON = '{ "ID":' . $ID . ', "IDM":' . $IDM . '}';
            //print $JSON;
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
            $this->cabeceras_model->onModificar($x->post('ID'), $DATA);

            /* MODIFICAR EN MAGNUS */
            $ClaveFinal = $x->post('Material');
            $data = array(
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL
                , 'DescripcionLarga' => $ClaveFinal . " " . $x->post('Descripcion')
            );
            $this->cabeceras_model->onModificarMagnus($this->input->post('IdMagnus'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarComponente() {
        try {
            $row = $this->input;
            switch ($row->post('CELDA')) {
                case 'Descripcion':
                    $this->db->set('Descripcion', strtoupper($row->post('VALOR')))->where('ID', $row->post('ID'))->update('sz_Materiales');
                    break;
                case 'Talla':
                    $this->db->set('Talla', strtoupper($row->post('VALOR')))->where('ID', $row->post('ID'))->update('sz_Materiales');
                    break;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->cabeceras_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRenglonDetalle() {
        try {
            $this->cabeceras_model->onEliminarRenglonDetalle($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}