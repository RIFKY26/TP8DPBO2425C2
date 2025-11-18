<?php
class Major {
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }

    public function getAll() {
        return $this->conn->query("SELECT * FROM majors");
    }
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM majors WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function insert($data) {
        $stmt = $this->conn->prepare("INSERT INTO majors (name) VALUES (?)");
        $stmt->bind_param("s", $data['name']);
        return $stmt->execute();
    }
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE majors SET name=? WHERE id=?");
        $stmt->bind_param("si", $data['name'], $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM majors WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>