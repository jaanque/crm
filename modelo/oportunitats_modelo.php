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
}
?>
