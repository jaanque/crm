<?php

class HomeController extends Controller {
    public function index() {
        // Redirigir a la pàgina de login per defecte
        header('Location: /usuari/login');
    }
}
