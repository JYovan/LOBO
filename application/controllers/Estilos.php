<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estilos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('estilos_model');
        $this->load->model('generales_model');
        $this->load->model('maquilas_model');
        $this->load->model('lineas_model');
        $this->load->model('series_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vEstilos');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print $_GET['callback'] . '(' . json_encode($this->estilos_model->getRecords()) . ');'; /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPlantillas() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('PLANTILLAS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getFamiliasProg() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('FAMILIAS PROG');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getHormas() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('HORMAS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTemporadas() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('TEMPORADAS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiposEstilo() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('TIPOS ESTILO');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMaquilas() {
        try {
            extract($this->input->post());
            $data = $this->maquilas_model->getMaquilas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGeneros() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosDescripcionByFielID('GENEROS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSeries() {
        try {
            extract($this->input->post());
            $data = $this->series_model->getSeries();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getLineas() {
        try {
            extract($this->input->post());
            $data = $this->lineas_model->getLineas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            print json_encode($this->estilos_model->getEstiloByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            var_dump($this->input->post());
            $data = array(
                'Linea' => ($this->input->post('Linea') !== NULL && $this->input->post('Linea') !== 'null') ? $this->input->post('Linea') : NULL,
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'FamiliaProg' => ($this->input->post('FamiliaProg') !== NULL && $this->input->post('FamiliaProg') !== 'null') ? $this->input->post('FamiliaProg') : NULL,
                'Serie' => ($this->input->post('Serie') !== NULL && $this->input->post('Serie') !== 'null') ? $this->input->post('Serie') : NULL,
                'Horma' => ($this->input->post('Horma') !== NULL && $this->input->post('Horma') !== 'null') ? $this->input->post('Horma') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL && $this->input->post('Genero') !== 'null') ? $this->input->post('Genero') : NULL,
                'Desperdicio' => ($this->input->post('Desperdicio') !== NULL ) ? $this->input->post('Desperdicio') : NULL,
                'Liberado' => ($this->input->post('Liberado') !== NULL) ? $this->input->post('Liberado') : NULL,
                'Herramental' => ($this->input->post('Herramental') !== NULL) ? $this->input->post('Herramental') : NULL,
                'Maquila' => ($this->input->post('Maquila') !== NULL && $this->input->post('Maquila') !== 'null') ? $this->input->post('Maquila') : NULL,
                'Notas' => ($this->input->post('Notas') !== NULL) ? $this->input->post('Notas') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Temporada' => ($this->input->post('Temporada') !== NULL && $this->input->post('Temporada') !== 'null') ? $this->input->post('Temporada') : NULL,
                'PuntoCentral' => ($this->input->post('PuntoCentral') !== NULL) ? $this->input->post('PuntoCentral') : NULL,
                'Plantilla' => ($this->input->post('Plantilla') !== NULL) ? $this->input->post('Plantilla') : NULL,
                'ConsumoPiel' => ($this->input->post('ConsumoPiel') !== NULL) ? $this->input->post('ConsumoPiel') : NULL,
                'ConsumoForro' => ($this->input->post('ConsumoForro') !== NULL) ? $this->input->post('ConsumoForro') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'GdoDificultad' => ($this->input->post('GdoDificultad') !== NULL) ? $this->input->post('GdoDificultad') : NULL,
                'TamEtiTras' => ($this->input->post('TamEtiTras') !== NULL) ? $this->input->post('TamEtiTras') : NULL,
                'PielEtiTras' => ($this->input->post('PielEtiTras') !== NULL) ? $this->input->post('PielEtiTras') : NULL,
                'ForroEtiTras' => ($this->input->post('ForroEtiTras') !== NULL) ? $this->input->post('ForroEtiTras') : NULL,
                'SuelaEtiTras' => ($this->input->post('SuelaEtiTras') !== NULL) ? $this->input->post('SuelaEtiTras') : NULL,
                'TipoConstruccionEtiTras' => ($this->input->post('TipoConstruccionEtiTras') !== NULL) ? $this->input->post('TipoConstruccionEtiTras') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Registro' => Date('d/m/Y h:i:s a')
            );

            $ID = $this->estilos_model->onAgregar($data);


            $URL_DOC = 'uploads/Estilos/';
            $master_url = $URL_DOC . '/';
            if (isset($_FILES["Foto"]["name"])) {
                if (!file_exists($URL_DOC)) {
                    mkdir($URL_DOC, 0777, true);
                }
                if (!file_exists(utf8_decode($URL_DOC . '/' . $ID))) {
                    mkdir(utf8_decode($URL_DOC . '/' . $ID), 0777, true);
                }
                if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $URL_DOC . '/' . $ID . '/' . utf8_decode($_FILES["Foto"]["name"]))) {
                    $img = $master_url . $ID . '/' . $_FILES["Foto"]["name"];
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $img;
                    $config['maintain_ratio'] = true;
                    $config['width'] = 850;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $DATA = array(
                        'Foto' => ($img),
                    );
                    $this->estilos_model->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->estilos_model->onModificar($ID, $DATA);
                }
            }
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {

        $ID = $this->input->post('ID');
        extract($this->input->post());

        try {
            $data = array(
                'Linea' => ($this->input->post('Linea') !== NULL && $this->input->post('Linea') !== 'null') ? $this->input->post('Linea') : NULL,
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'FamiliaProg' => ($this->input->post('FamiliaProg') !== NULL && $this->input->post('FamiliaProg') !== 'null') ? $this->input->post('FamiliaProg') : NULL,
                'Serie' => ($this->input->post('Serie') !== NULL && $this->input->post('Serie') !== 'null') ? $this->input->post('Serie') : NULL,
                'Horma' => ($this->input->post('Horma') !== NULL && $this->input->post('Horma') !== 'null') ? $this->input->post('Horma') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL && $this->input->post('Genero') !== 'null') ? $this->input->post('Genero') : NULL,
                'Desperdicio' => ($this->input->post('Desperdicio') !== NULL ) ? $this->input->post('Desperdicio') : NULL,
                'Liberado' => ($this->input->post('Liberado') !== NULL) ? $this->input->post('Liberado') : NULL,
                'Herramental' => ($this->input->post('Herramental') !== NULL) ? $this->input->post('Herramental') : NULL,
                'Maquila' => ($this->input->post('Maquila') !== NULL && $this->input->post('Maquila') !== 'null') ? $this->input->post('Maquila') : NULL,
                'Notas' => ($this->input->post('Notas') !== NULL) ? $this->input->post('Notas') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Temporada' => ($this->input->post('Temporada') !== NULL && $this->input->post('Temporada') !== 'null') ? $this->input->post('Temporada') : NULL,
                'PuntoCentral' => ($this->input->post('PuntoCentral') !== NULL) ? $this->input->post('PuntoCentral') : NULL,
                'Plantilla' => ($this->input->post('Plantilla') !== NULL) ? $this->input->post('Plantilla') : NULL,
                'ConsumoPiel' => ($this->input->post('ConsumoPiel') !== NULL) ? $this->input->post('ConsumoPiel') : NULL,
                'ConsumoForro' => ($this->input->post('ConsumoForro') !== NULL) ? $this->input->post('ConsumoForro') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'GdoDificultad' => ($this->input->post('GdoDificultad') !== NULL) ? $this->input->post('GdoDificultad') : NULL,
                'TamEtiTras' => ($this->input->post('TamEtiTras') !== NULL) ? $this->input->post('TamEtiTras') : NULL,
                'PielEtiTras' => ($this->input->post('PielEtiTras') !== NULL) ? $this->input->post('PielEtiTras') : NULL,
                'ForroEtiTras' => ($this->input->post('ForroEtiTras') !== NULL) ? $this->input->post('ForroEtiTras') : NULL,
                'SuelaEtiTras' => ($this->input->post('SuelaEtiTras') !== NULL) ? $this->input->post('SuelaEtiTras') : NULL,
                'TipoConstruccionEtiTras' => ($this->input->post('TipoConstruccionEtiTras') !== NULL) ? $this->input->post('TipoConstruccionEtiTras') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->estilos_model->onModificar($this->input->post('ID'), $data);

            if ($_FILES["Foto"]["tmp_name"] !== "") {
                $URL_DOC = 'uploads/Estilos';
                $master_url = $URL_DOC . '/';
                if (isset($_FILES["Foto"]["name"])) {
                    if (!file_exists($URL_DOC)) {
                        mkdir($URL_DOC, 0777, true);
                    }
                    if (!file_exists(utf8_decode($URL_DOC . '/' . $ID))) {
                        mkdir(utf8_decode($URL_DOC . '/' . $ID), 0777, true);
                    }
                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $URL_DOC . '/' . $ID . '/' . utf8_decode($_FILES["Foto"]["name"]))) {
                        $img = $master_url . $ID . '/' . $_FILES["Foto"]["name"];
                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $img;
                        $config['maintain_ratio'] = true;
                        $config['width'] = 850;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $DATA = array(
                            'Foto' => ($img),
                        );
                        $this->estilos_model->onModificar($ID, $DATA);
                    } else {
                        $DATA = array(
                            'Foto' => (null),
                        );
                        $this->estilos_model->onModificar($ID, $DATA);
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->estilos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
