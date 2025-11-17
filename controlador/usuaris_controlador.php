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

    // Aquí aniran els altres mètodes del controlador (llistat, etc.)
}
?>
