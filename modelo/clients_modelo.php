<?php
// Modelo/clients_modelo.php

class ClientsModelo {
    private $connexio;

    public function __construct() {
        $this->connexio = conectar();
    }

    public function comptarTots() {
        $resultat = $this->connexio->query("SELECT COUNT(*) as total FROM clients");
        $total = $resultat->fetch_assoc()['total'];
        // No tanquem la connexió aquí per si es criden altres mètodes
        return $total;
    }

    public function obtenirTots() {
        $resultat = $this->connexio->query("SELECT c.*, u.nom_complet as nom_responsable FROM clients c LEFT JOIN usuaris u ON c.usuari_responsable = u.id_usuari");
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);
        $this->connexio->close();
        return $dades;
    }

    public function cercar($terme) {
        $sql = "SELECT c.*, u.nom_complet as nom_responsable FROM clients c LEFT JOIN usuaris u ON c.usuari_responsable = u.id_usuari WHERE c.nom_complet LIKE ? OR c.empresa LIKE ?";
        $stmt = $this->connexio->prepare($sql);
        $terme_like = "%" . $terme . "%";
        $stmt->bind_param("ss", $terme_like, $terme_like);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $this->connexio->close();
        return $dades;
    }

    public function obtenirNomsClients() {
        $resultat = $this->connexio->query("SELECT id_client, nom_complet FROM clients ORDER BY nom_complet ASC");
        $dades = $resultat->fetch_all(MYSQLI_ASSOC);
        // No tanquem la connexió per si s'utilitza després
        return $dades;
    }

    public function getClientById($id) {
        $sql = "SELECT * FROM clients WHERE id_client = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $client = $resultat->fetch_assoc();
        $stmt->close();
        // No tanquem la connexió per si es necessita després
        return $client;
    }

    public function updateClient($id, $nom_complet, $email, $telefon, $empresa) {
        $sql = "UPDATE clients SET nom_complet = ?, email = ?, telefon = ?, empresa = ? WHERE id_client = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("ssssi", $nom_complet, $email, $telefon, $empresa, $id);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }

    public function deleteClientById($id) {
        $sql = "DELETE FROM clients WHERE id_client = ?";
        $stmt = $this->connexio->prepare($sql);
        $stmt->bind_param("i", $id);
        $exit = $stmt->execute();
        $stmt->close();
        $this->connexio->close();
        return $exit;
    }
}
?>
