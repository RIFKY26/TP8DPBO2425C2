<?php
class Lecturer {
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }

    public function getAll() {
        // Join dengan Majors
        $sql = "SELECT l.*, m.name as major_name FROM lecturers l 
                LEFT JOIN majors m ON l.major_id = m.id";
        return $this->conn->query($sql);
    }
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function insert($data) {
        $stmt = $this->conn->prepare("INSERT INTO lecturers (name, nidn, phone, join_date, major_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $data['name'], $data['nidn'], $data['phone'], $data['join_date'], $data['major_id']);
        return $stmt->execute();
    }
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE lecturers SET name=?, nidn=?, phone=?, join_date=?, major_id=? WHERE id=?");
        $stmt->bind_param("ssssii", $data['name'], $data['nidn'], $data['phone'], $data['join_date'], $data['major_id'], $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>