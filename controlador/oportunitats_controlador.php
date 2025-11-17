<?php
// Controlador/oportunitats_controlador.php

require_once 'modelo/oportunitats_modelo.php';

class OportunitatsControlador {

    public function __construct() {
        if (!isset($_SESSION['id_usuari'])) {
            header('Location: index.php?c=usuaris&m=login');
            exit;
        }
    }

    public function index() {
        $modelo = new OportunitatsModelo();

        $estat = isset($_GET['estat']) ? $_GET['estat'] : null;
        $id_client = isset($_GET['id_client']) ? $_GET['id_client'] : null;

        $data['oportunitats'] = $modelo->obtenirTotes($estat, $id_client);

        // Necessitem la llista de clients per al filtre
        require_once 'modelo/clients_modelo.php';
        $clients_modelo = new ClientsModelo();
        $data['clients'] = $clients_modelo->obtenirNomsClients();

        require_once 'vista/oportunitats/index.php';
    }
}
?>
