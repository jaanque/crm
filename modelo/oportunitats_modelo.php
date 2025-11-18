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

    public function obtenirTotes($estat = null, $id_client = null) {
        $sql = "SELECT o.*, c.nom_complet as nom_client, u.nom_complet as nom_responsable
                FROM oportunitats o
                LEFT JOIN clients c ON o.id_client = c.id_client
                LEFT JOIN usuaris u ON o.usuari_responsable = u.id_usuari
                WHERE 1=1";

        if ($estat) {
            $sql .= " AND o.estat = '" . $this->connexio->real_escape_string($estat) . "'";
        }
        if ($id_client) {
            $sql .= " AND o.id_client = " . intval($id_client);
        }

        $resultat = $this->connexio->query($sql);
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);
        // No tanquem la connexió aquí per si es fan servir altres mètodes
        return $dades;
    }

    public function insertOpportunity($id_client, $titol, $descripcio, $valor_estimat, $estat, $usuari_responsable) {
        $sql = "INSERT INTO oportunitats (id_client, titol, descripcio, valor_estimat, estat, usuari_responsable, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("issdsi", $id_client, $titol, $descripcio, $valor_estimat, $estat, $usuari_responsable);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }

    public function getOpportunityById($id) {
        $sql = "SELECT o.*, c.nom_complet as nom_client, u.nom_complet as nom_responsable
                FROM oportunitats o
                LEFT JOIN clients c ON o.id_client = c.id_client
                LEFT JOIN usuaris u ON o.usuari_responsable = u.id_usuari
                WHERE o.id_oportunitat = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $oportunitat = $resultat->fetch_assoc();
        $stmt->close();
        // No tanquem la connexió per si es necessita després
        return $oportunitat;
    }

    public function updateOpportunity($id, $id_client, $titol, $descripcio, $valor_estimat, $estat) {
        $sql = "UPDATE oportunitats SET id_client = ?, titol = ?, descripcio = ?, valor_estimat = ?, estat = ? WHERE id_oportunitat = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("issdsi", $id_client, $titol, $descripcio, $valor_estimat, $estat, $id);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }

    public function deleteOpportunityById($id) {
        $sql = "DELETE FROM oportunitats WHERE id_oportunitat = ?";
        $stmt = $this.connexio->prepare($sql);
        $stmt->bind_param("i", $id);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }

    public function obtenirOportunitatsPerUsuari($id_usuari) {
        $sql = "SELECT o.*, c.nom_complet as nom_client, u.nom_complet as nom_responsable
                FROM oportunitats o
                LEFT JOIN clients c ON o.id_client = c.id_client
                LEFT JOIN usuaris u ON o.usuari_responsable = u.id_usuari
                WHERE o.usuari_responsable = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id_usuari);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);
        // No tanquem la connexio per si es fan servir altres metodes
        return $dades;
    }
}
?>
