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
        if ($_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }

        $id = $_GET['id'];
        $modelo = new ClientsModelo();
        $data['client'] = $modelo->getClientById($id);

        require_once 'vista/clients/editar.php';
    }

    public function actualitzar() {
        if ($_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $nom_complet = $_POST['nom_complet'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $empresa = $_POST['empresa'];

            $modelo = new ClientsModelo();
            $modelo->updateClient($id, $nom_complet, $email, $telefon, $empresa);

            header('Location: index.php?c=clients&m=index');
            exit;
        }
    }
}
?>
