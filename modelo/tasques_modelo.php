<?php
// Modelo/tasques_modelo.php

class TasquesModelo {
    private $connexio;

    public function __construct() {
        $this->connexio = conectar();
    }

    public function comptarPendents() {
        $resultat = $this->connexio->query("SELECT COUNT(*) as total FROM tasques WHERE estat = 'pendent'");
        $total = $resultat->fetch_assoc()['total'];
        $this->connexio->close();
        return $total;
    }

    // Aquí aniran els altres mètodes del model de tasques
}
?>
