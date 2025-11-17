<?php

class TascaController extends Controller {
    private $tascaModel;

    public function __construct() {
        $this->tascaModel = $this->model('Tasca');
    }

    public function index() {
        $tasques = $this->tascaModel->getAll();
        $this->view('tasca/index', ['tasques' => $tasques]);
    }

    public function complete($id) {
        if ($this->tascaModel->complete($id)) {
            header('Location: /tasca');
        } else {
            die('Alguna cosa ha anat malament en actualitzar la tasca.');
        }
    }
}
