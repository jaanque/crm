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

    public function crear() {
        // Necessitem la llista d'oportunitats per al formulari
        require_once 'modelo/oportunitats_modelo.php';
        $oportunitats_modelo = new OportunitatsModelo();
        $data['oportunitats'] = $oportunitats_modelo->obtenirTotes();

        require_once 'vista/tasques/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_oportunitat = $_POST['id_oportunitat'];
            $descripcio = $_POST['descripcio'];
            $data_tasca = $_POST['data_tasca'];
            $estat = 'pendent'; // Les noves tasques sempre comencen com a pendents

            $modelo = new TasquesModelo();
            $modelo->insertTask($id_oportunitat, $descripcio, $data_tasca, $estat);

            header('Location: index.php?c=tasques&m=index');
            exit;
        }
    }

    public function llistat() {
        $modelo = new TasquesModelo();
        $data['tasques'] = $modelo->getAllTasks();

        require_once 'vista/tasques/llistat.php';
    }
}
?>
