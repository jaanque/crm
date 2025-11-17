<?php
// Modelo/oportunitats_modelo.php

class OportunitatsModelo {
    private $connexio;

    public function __construct() {
        $this->connexio = conectar();
    }

    public function comptarPerEstat() {
        $resultat = $this->connexio->query("SELECT estat, COUNT(*) as total FROM oportunitats GROUP BY estat");
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);
        $this->connexio->close();
        return $dades;
    }

    // Aquí aniran els altres mètodes del model d'oportunitats
}
?>
