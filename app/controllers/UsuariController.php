<?php

class UsuariController extends Controller {
    private $usuariModel;

    public function __construct() {
        $this->usuariModel = $this->model('Usuari');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dades = [
                'email' => trim($_POST['email']),
                'contrasenya' => trim($_POST['password']),
                'error' => ''
            ];

            if (empty($dades['email']) || empty($dades['contrasenya'])) {
                $dades['error'] = 'Si us plau, ompliu tots els camps';
                $this->view('usuari/login', $dades);
            } else {
                if ($this->usuariModel->findByEmail($dades['email'])) {
                    session_start();
                    $_SESSION['user_email'] = $dades['email'];
                    header('Location: /panell');
                } else {
                    $dades['error'] = 'Usuari o contrasenya incorrectes';
                    $this->view('usuari/login', $dades);
                }
            }
        } else {
            $this->view('usuari/login');
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /usuari/login');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dades = [
                'nom_complet' => trim($_POST['nombre_completo']),
                'email' => trim($_POST['email']),
                'contrasenya' => trim($_POST['password']),
                'rol' => 'venedor',
                'error' => ''
            ];

            if (empty($dades['nom_complet']) || empty($dades['email']) || empty($dades['contrasenya'])) {
                $dades['error'] = 'Si us plau, ompliu tots els camps';
                $this->view('usuari/register', $dades);
            } elseif ($this->usuariModel->findByEmail($dades['email'])) {
                $dades['error'] = 'El correu electrònic ja està registrat';
                $this->view('usuari/register', $dades);
            } else {
                if ($this->usuariModel->register($dades)) {
                    header('Location: /usuari/login');
                } else {
                    $dades['error'] = 'Alguna cosa ha anat malament. Si us plau, torneu-ho a provar.';
                    $this->view('usuari/register', $dades);
                }
            }
        } else {
            $this->view('usuari/register');
        }
    }

    public function index() {
        session_start();
        if ($_SESSION['user_rol'] != 'administrador') {
            header('Location: /');
            exit;
        }

        $usuaris = $this->usuariModel->getAll();
        $this->view('usuari/index', ['usuaris' => $usuaris]);
    }
}
