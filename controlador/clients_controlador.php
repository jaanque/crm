<?php
// Controlador/clients_controlador.php

require_once 'modelo/clients_modelo.php';

class ClientsControlador {

    public function __construct() {
        if (!isset($_SESSION['id_usuari'])) {
            header('Location: index.php?c=usuaris&m=login');
            exit;
        }
    }

    public function index() {
        $modelo = new ClientsModelo();

        if (isset($_GET['cerca'])) {
            $data['clients'] = $modelo->cercar($_GET['cerca']);
        } else {
            $data['clients'] = $modelo->obtenirTots();
        }

        require_once 'vista/clients/index.php';
    }
}
?>
