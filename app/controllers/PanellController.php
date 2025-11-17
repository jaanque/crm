<?php

class PanellController extends Controller {
    public function __construct() {
        $this->clientModel = $this->model('Client');
        $this->oportunitatModel = $this->model('Oportunitat');
        $this->tascaModel = $this->model('Tasca');
    }

    public function index() {
        session_start();
        if ($_SESSION['user_rol'] != 'administrador') {
            header('Location: /');
            exit;
        }

        $dades = [
            'total_clients' => $this->clientModel->countAll(),
            'oportunitats_per_estat' => $this->oportunitatModel->countByStatus(),
            'tasques_pendents' => $this->tascaModel->countPending()
        ];

        $this->view('panell/index', $dades);
    }
}
