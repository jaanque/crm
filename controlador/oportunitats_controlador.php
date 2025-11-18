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

    public function crear() {
        // Necessitem la llista de clients per al formulari
        require_once 'modelo/clients_modelo.php';
        $clients_modelo = new ClientsModelo();
        $data['clients'] = $clients_modelo->obtenirNomsClients();

        require_once 'vista/oportunitats/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_client = $_POST['id_client'];
            $titol = $_POST['titol'];
            $descripcio = $_POST['descripcio'];
            $valor_estimat = $_POST['valor_estimat'];
            $estat = $_POST['estat'];
            $usuari_responsable = $_SESSION['id_usuari'];

            $modelo = new OportunitatsModelo();
            $modelo->insertOpportunity($id_client, $titol, $descripcio, $valor_estimat, $estat, $usuari_responsable);

            header('Location: index.php?c=oportunitats&m=index');
            exit;
        }
    }

    public function veure() {
        $id = $_GET['id'];
        $modelo = new OportunitatsModelo();
        $data['oportunitat'] = $modelo->getOpportunityById($id);

        require_once 'vista/oportunitats/veure.php';
    }

    public function editar() {
        $id = $_GET['id'];
        $modelo = new OportunitatsModelo();
        $data['oportunitat'] = $modelo->getOpportunityById($id);

        // Necessitem la llista de clients per al formulari
        require_once 'modelo/clients_modelo.php';
        $clients_modelo = new ClientsModelo();
        $data['clients'] = $clients_modelo->obtenirNomsClients();

        require_once 'vista/oportunitats/editar.php';
    }

    public function actualitzar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $id_client = $_POST['id_client'];
            $titol = $_POST['titol'];
            $descripcio = $_POST['descripcio'];
            $valor_estimat = $_POST['valor_estimat'];
            $estat_nou = $_POST['estat'];

            $modelo = new OportunitatsModelo();
            $oportunitat_actual = $modelo->getOpportunityById($id);

            // Control de canvi d'estat per rol
            if ($_SESSION['rol'] != 'administrador' && $oportunitat_actual['estat'] != $estat_nou) {
                die("Accés denegat. Només els administradors poden canviar l'estat.");
            }

            $modelo->updateOpportunity($id, $id_client, $titol, $descripcio, $valor_estimat, $estat_nou);

            header('Location: index.php?c=oportunitats&m=index');
            exit;
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $modelo = new OportunitatsModelo();
        $modelo->deleteOpportunityById($id);

        header('Location: index.php?c=oportunitats&m=index');
        exit;
    }
}
?>
