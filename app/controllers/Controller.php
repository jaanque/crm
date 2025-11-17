<?php

class Controller {
    // Método para cargar un modelo
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Método para cargar una vista
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('La vista no existe');
        }
    }
}
