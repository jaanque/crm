<?php
// Controlador/tasques_controlador.php

require_once 'modelo/tasques_modelo.php';

class TasquesControlador {

    public function __construct() {
        if (!isset($_SESSION['id_usuari'])) {
            header('Location: index.php?c=usuaris&m=login');
            exit;
        }
    }

    public function index() {
        $modelo = new TasquesModelo();

        // Obtenir les tasques pendents de l'usuari actual
        $id_usuari = $_SESSION['id_usuari'];
        $data['tasques'] = $modelo->obtenirPendentsPerUsuari($id_usuari);

        require_once 'vista/tasques/index.php';
    }

    public function completar() {
        if (isset($_GET['id'])) {
            $id_tasca = $_GET['id'];
            $modelo = new TasquesModelo();
            $modelo->marcarCompletada($id_tasca);
        }

        // Redirigir sempre al llistat de tasques
        header('Location: index.php?c=tasques&m=index');
        exit;
    }
}
?>
