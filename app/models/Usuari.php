<?php

class Usuari extends Model {
    // Buscar un usuari pel seu email
    public function findByEmail($email) {
        $this->db->query("SELECT * FROM usuaris WHERE email = :email");
        $this->db->bind(':email', $email);
        $fila = $this->db->single();
        return $fila;
    }

    public function register($dades) {
        $this->db->query("INSERT INTO usuaris (nom_complet, email, contrasenya, rol) VALUES (:nom, :email, :contrasenya, :rol)");
        $this->db->bind(':nom', $dades['nom_complet']);
        $this->db->bind(':email', $dades['email']);
        $this->db->bind(':contrasenya', $dades['contrasenya']);
        $this->db->bind(':rol', $dades['rol']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $this->db->query("SELECT id_usuari, nom_complet, email, rol FROM usuaris");
        return $this->db->resultSet();
    }
}
