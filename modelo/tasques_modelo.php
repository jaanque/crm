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

    public function obtenirPendentsPerUsuari($id_usuari) {
        $sql = "SELECT t.*, o.titol as titol_oportunitat
                FROM tasques t
                LEFT JOIN oportunitats o ON t.id_oportunitat = o.id_oportunitat
                WHERE o.usuari_responsable = ? AND t.estat = 'pendent'
                ORDER BY t.data ASC";

        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id_usuari);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);

        return $dades;
    }

    public function marcarCompletada($id_tasca) {
        $sql = "UPDATE tasques SET estat = 'completada' WHERE id_tasca = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id_tasca);
        $exit = $stmt->execute();

        $stmt->close();
        $this->connexio->close();

        return $exit;
    }
}
?>
