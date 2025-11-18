<?php
// Controlador/clients_controlador.php

require_once 'modelo/clients_modelo.php';

class ClientsControlador {
    private $modelo;

    public function __construct() {
        if (!isset($_SESSION['id_usuari'])) {
            header('Location: index.php?c=usuaris&m=login');
            exit;
        }
        $this->modelo = new ClientsModelo();
    }

    public function index() {
        if (isset($_GET['cerca'])) {
            $data['clients'] = $this->modelo->cercar($_GET['cerca']);
        } else {
            $data['clients'] = $this->modelo->obtenirTots();
        }
        require_once 'vista/clients/index.php';
    }

    private function verificarPermisos($id_client) {
        $client = $this->modelo->getClientById($id_client);
        if (!$client) {
            die("Client no trobat.");
        }
        $esAdmin = $_SESSION['rol'] == 'administrador';
        $esResponsable = $_SESSION['rol'] == 'venedor' && $client['usuari_responsable'] == $_SESSION['id_usuari'];
        if (!$esAdmin && !$esResponsable) {
            die("Accés denegat.");
        }
        return $client;
    }

    public function editar() {
        $id = $_GET['id'];
        $data['client'] = $this->verificarPermisos($id);
        require_once 'vista/clients/editar.php';
    }

    public function actualitzar() {
        $id = $_GET['id'];
        $this->verificarPermisos($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom_complet = $_POST['nom_complet'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $empresa = $_POST['empresa'];
            $this->modelo->updateClient($id, $nom_complet, $email, $telefon, $empresa);
            header('Location: index.php?c=clients&m=index');
            exit;
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->verificarPermisos($id);
        $this->modelo->deleteClientById($id);
        header('Location: index.php?c=clients&m=index');
        exit;
    }
}
?>
