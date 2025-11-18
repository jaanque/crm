<?php
// Controlador/usuaris_controlador.php

require_once 'modelo/usuaris_modelo.php';

class UsuarisControlador {

    // Mètode per defecte, redirigeix al login
    public function index() {
        $this->login();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Processar el formulari de login
            $email = $_POST['email'];
            $contrasenya = $_POST['password'];

            $modelo = new UsuarisModelo();
            $usuari = $modelo->verificarCredencials($email, $contrasenya);

            if ($usuari) {
                // Iniciar sessió
                $_SESSION['id_usuari'] = $usuari['id_usuari'];
                $_SESSION['nom_complet'] = $usuari['nom_complet'];
                $_SESSION['rol'] = $usuari['rol'];
                // Redirigir al panell principal (que crearem més endavant)
                header('Location: index.php?c=panell&m=index');
                exit;
            } else {
                // Mostrar error
                $data['error'] = "Correu electrònic o contrasenya incorrectes.";
                require_once 'vista/usuaris/login.php';
            }
        } else {
            // Mostrar el formulari de login
            require_once 'vista/usuaris/login.php';
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?c=usuaris&m=login');
        exit;
    }

    public function llistat() {
        // Comprovar que sigui administrador
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }

        $modelo = new UsuarisModelo();
        $data['usuaris'] = $modelo->obtenirTots();

        require_once 'vista/usuaris/llistat.php';
    }

    public function crear() {
        if ($_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }
        require_once 'vista/usuaris/crear.php';
    }

    public function guardar() {
        if ($_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom_complet = $_POST['nom_complet'];
            $email = $_POST['email'];
            $contrasenya = $_POST['password'];
            $rol = $_POST['rol'];
            $modelo = new UsuarisModelo();
            $modelo->insertUser($nom_complet, $email, $contrasenya, $rol);
            header('Location: index.php?c=usuaris&m=llistat');
            exit;
        }
    }

    public function editar() {
        if ($_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }
        $id = $_GET['id'];
        $modelo = new UsuarisModelo();
        $data['usuari'] = $modelo->getUserById($id);
        require_once 'vista/usuaris/editar.php';
    }

    public function actualitzar() {
        if ($_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $nom_complet = $_POST['nom_complet'];
            $email = $_POST['email'];
            $rol = $_POST['rol'];
            $modelo = new UsuarisModelo();
            $modelo->updateUser($id, $nom_complet, $email, $rol);
            header('Location: index.php?c=usuaris&m=llistat');
            exit;
        }
    }

    public function eliminar() {
        if ($_SESSION['rol'] != 'administrador') {
            die("Accés denegat.");
        }
        $id = $_GET['id'];
        $modelo = new UsuarisModelo();
        $modelo->deleteUserById($id);
        header('Location: index.php?c=usuaris&m=llistat');
        exit;
    }
}
?>
