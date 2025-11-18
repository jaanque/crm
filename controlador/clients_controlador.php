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

    public function editar() {
        $id = $_GET['id'];
        $modelo = new ClientsModelo();
        $client = $modelo->getClientById($id);

        if (!$client) {
            die("Client no trobat.");
        }

        $canAccess = ($_SESSION['rol'] == 'administrador' || ($_SESSION['rol'] == 'venedor' && $client['usuari_responsable'] == $_SESSION['id_usuari']));

        if (!$canAccess) {
            die("Accés denegat.");
        }

        $data['client'] = $client;
        require_once 'vista/clients/editar.php';
    }

    public function actualitzar() {
        $id = $_GET['id'];
        $modelo = new ClientsModelo();
        $client = $modelo->getClientById($id);

        if (!$client) {
            die("Client no trobat.");
        }

        $canAccess = ($_SESSION['rol'] == 'administrador' || ($_SESSION['rol'] == 'venedor' && $client['usuari_responsable'] == $_SESSION['id_usuari']));

        if (!$canAccess) {
            die("Accés denegat.");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom_complet = $_POST['nom_complet'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $empresa = $_POST['empresa'];

            $updateModelo = new ClientsModelo();
            $updateModelo->updateClient($id, $nom_complet, $email, $telefon, $empresa);

            header('Location: index.php?c=clients&m=index');
            exit;
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $modelo = new ClientsModelo();
        $client = $modelo->getClientById($id);

        if (!$client) {
            die("Client no trobat.");
        }

        $canAccess = ($_SESSION['rol'] == 'administrador' || ($_SESSION['rol'] == 'venedor' && $client['usuari_responsable'] == $_SESSION['id_usuari']));

        if (!$canAccess) {
            die("Accés denegat.");
        }

        $deleteModelo = new ClientsModelo();
        $deleteModelo->deleteClientById($id);

        header('Location: index.php?c=clients&m=index');
        exit;
    }
}
?>
