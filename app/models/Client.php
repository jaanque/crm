<?php

class Client extends Model {
    public function getAll() {
        $this->db->query("SELECT * FROM clients");
        return $this->db->resultSet();
    }

    public function search($terme) {
        $this->db->query("SELECT * FROM clients WHERE nom_complet LIKE :terme OR empresa LIKE :terme");
        $this->db->bind(':terme', '%' . $terme . '%');
        return $this->db->resultSet();
    }

    public function countAll() {
        $this->db->query("SELECT COUNT(*) as total FROM clients");
        $fila = $this->db->single();
        return $fila->total;
    }
}
