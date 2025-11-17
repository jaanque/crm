<?php

class ClientController extends Controller {
    private $clientModel;

    public function __construct() {
        $this->clientModel = $this->model('Client');
    }

    public function index() {
        $clients = $this->clientModel->getAll();
        $this->view('client/index', ['clients' => $clients]);
    }

    public function search() {
        if (isset($_GET['terme'])) {
            $terme = trim($_GET['terme']);
            $clients = $this->clientModel->search($terme);
            $this->view('client/index', ['clients' => $clients]);
        } else {
            header('Location: /client');
        }
    }
}
