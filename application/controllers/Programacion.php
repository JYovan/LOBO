<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('programacion_model')->model('cerrarprog_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vProgramacion')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->programacion_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onMarcarDesMarcar() {
        try {
            $controles = json_decode($this->input->post('SubControles'));
            foreach ($controles as $k => $v) {
                $this->programacion_model->onModificarDetalle($v->ID, $this->input->post('Marca'));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarMSD() {
        try {
            $rows = json_decode($this->input->post('rows'), false);
            foreach ($rows as $k => $v) {
                print_r($v);
                if ($this->input->post("SEMANA") !== '') {
                    $MAQ = $this->input->post("MAQUILA") !== '' ? $this->input->post("MAQUILA") : $v->MAQUILA;
                    $SEM = $this->input->post("SEMANA") !== '' ? $this->input->post("SEMANA") : $v->SEMANA;
                    $Y = substr(Date('Y'), 2);
                    $M = str_pad($MAQ, 2, '0', STR_PAD_LEFT);
                    $S = str_pad($SEM, 2, '0', STR_PAD_LEFT);
                    $MAX = $this->cerrarprog_model->getMaximoConsecutivo($MAQ, $SEM, $v->ID);
                    $FMAX = 0;
                    if (count($MAX) <= 0) {
                        $FMAX = '1';
                    } else {
                        $FMAX = $MAX[0]->MAX;
                    }
                    $C = str_pad($FMAX, 3, '0', STR_PAD_LEFT);
                    $this->db->set('ctSem', $S)->set('ctCons', $C)->set('Control', $Y . $S . $M . $C)->where('PedidoDetalle', $v->ID)->update('sz_Controles');
                    $this->db->set('Sem', $S)->where('ID', $v->ID)->update('sz_PedidosDetalle');
                }
                if ($this->input->post("MAQUILA") !== '') {
                    $MAQ = $this->input->post("MAQUILA") !== '' ? $this->input->post("MAQUILA") : $v->MAQUILA;
                    $SEM = $this->input->post("SEMANA") !== '' ? $this->input->post("SEMANA") : $v->SEMANA;
                    $Y = substr(Date('Y'), 2);
                    $M = str_pad($MAQ, 2, '0', STR_PAD_LEFT);
                    $S = str_pad($SEM, 2, '0', STR_PAD_LEFT);
                    $MAX = $this->cerrarprog_model->getMaximoConsecutivo($MAQ, $SEM, $v->ID);
                    $FMAX = 0;
                    if (count($MAX) <= 0) {
                        $FMAX = '1';
                    } else {
                        $FMAX = $MAX[0]->MAX;
                    }
                    $C = str_pad($FMAX, 3, '0', STR_PAD_LEFT);
                    $this->db->set('ctMaq', $M)->set('ctCons', $C)->set('Control', $Y . $S . $M . $C)->where('PedidoDetalle', $v->ID)->update('sz_Controles');
                    $this->db->set('Maq', $M)->where('ID', $v->ID)->update('sz_PedidosDetalle');
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}