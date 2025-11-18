<?php
// Modelo/usuaris_modelo.php

class UsuarisModelo {
    private $connexio;

    public function __construct() {
        // La connexió es crea al constructor
        $this->connexio = conectar();
    }

    public function verificarCredencials($email, $contrasenya) {
        $sql = "SELECT * FROM usuaris WHERE email = ? AND contrasenya = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("ss", $email, $contrasenya);
        $stmt->execute();
        $resultat = $stmt->get_result();

        // Tanquem la connexió
        $stmt->close();
        $this->connexio->close();

        return $resultat->fetch_assoc();
    }

    public function obtenirTots() {
        $resultat = $this->connexio->query("SELECT id_usuari, nom_complet, email, rol FROM usuaris ORDER BY nom_complet ASC");
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);
        $this->connexio->close();
        return $dades;
    }
}
?>
