<?php

class OportunitatController extends Controller {
    private $oportunitatModel;

    public function __construct() {
        $this->oportunitatModel = $this->model('Oportunitat');
    }

    public function index() {
        $oportunitats = $this->oportunitatModel->getAll();
        $this->view('oportunitat/index', ['oportunitats' => $oportunitats]);
    }

    public function filter() {
        $estat = isset($_GET['estat']) ? trim($_GET['estat']) : '';
        $client = isset($_GET['client']) ? trim($_GET['client']) : '';

        $oportunitats = $this->oportunitatModel->filter($estat, $client);
        $this->view('oportunitat/index', ['oportunitats' => $oportunitats]);
    }
}
