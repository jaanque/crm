<?php

class Tasca extends Model {
    public function getAll() {
        $this->db->query("SELECT * FROM tasques");
        return $this->db->resultSet();
    }

    public function complete($id) {
        $this->db->query("UPDATE tasques SET estat = 'completada' WHERE id_tasca = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function countPending() {
        $this->db->query("SELECT COUNT(*) as total FROM tasques WHERE estat = 'pendent'");
        $fila = $this->db->single();
        return $fila->total;
    }
}
