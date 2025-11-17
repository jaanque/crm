<?php
// Controlador/panell_controlador.php

class PanellControlador {

    public function __construct() {
        // Comprovar si l'usuari ha iniciat sessió
        if (!isset($_SESSION['id_usuari'])) {
            header('Location: index.php?c=usuaris&m=login');
            exit;
        }
    }

    public function index() {
        // Carregar els models necessaris
        require_once 'modelo/clients_modelo.php';
        require_once 'modelo/oportunitats_modelo.php';
        require_once 'modelo/tasques_modelo.php';

        $clients_modelo = new ClientsModelo();
        $oportunitats_modelo = new OportunitatsModelo();
        $tasques_modelo = new TasquesModelo();

        // Obtenir les dades per al panell
        $data['total_clients'] = $clients_modelo->comptarTots();
        $data['oportunitats_per_estat'] = $oportunitats_modelo->comptarPerEstat();
        $data['total_tasques_pendents'] = $tasques_modelo->comptarPendents();

        // Carregar la vista
        require_once 'vista/panell/index.php';
    }
}
?>
