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

    public function insertUser($nom_complet, $email, $contrasenya, $rol) {
        $sql = "INSERT INTO usuaris (nom_complet, email, contrasenya, rol) VALUES (?, ?, ?, ?)";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("ssss", $nom_complet, $email, $contrasenya, $rol);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM usuaris WHERE id_usuari = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $usuari = $resultat->fetch_assoc();
        $stmt->close();
        return $usuari;
    }

    public function updateUser($id, $nom_complet, $email, $rol) {
        $sql = "UPDATE usuaris SET nom_complet = ?, email = ?, rol = ? WHERE id_usuari = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("sssi", $nom_complet, $email, $rol, $id);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }

    public function deleteUserById($id) {
        $sql = "DELETE FROM usuaris WHERE id_usuari = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }
}
?>
