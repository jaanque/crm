<?php

class Oportunitat extends Model {
    public function getAll() {
        $this->db->query("SELECT * FROM oportunitats");
        return $this->db->resultSet();
    }

    public function filter($estat, $client) {
        $sql = "SELECT * FROM oportunitats WHERE 1=1";
        $params = [];

        if (!empty($estat)) {
            $sql .= " AND estat = :estat";
            $params[':estat'] = $estat;
        }

        if (!empty($client)) {
            $sql .= " AND id_client = :client";
            $params[':client'] = $client;
        }

        $this->db->query($sql);
        foreach ($params as $clau => $valor) {
            $this->db->bind($clau, $valor);
        }

        return $this->db->resultSet();
    }

    public function countByStatus() {
        $this->db->query("SELECT estat, COUNT(*) as total FROM oportunitats GROUP BY estat");
        return $this->db->resultSet();
    }
}
