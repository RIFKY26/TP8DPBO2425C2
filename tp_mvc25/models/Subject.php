<?php
class Subject {
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }

    public function getAll() {
        // Join dengan Lecturers
        $sql = "SELECT s.*, l.name as lecturer_name FROM subjects s 
                LEFT JOIN lecturers l ON s.lecturer_id = l.id";
        return $this->conn->query($sql);
    }
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM subjects WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function insert($data) {
        $stmt = $this->conn->prepare("INSERT INTO subjects (subject_code, subject_name, sks, lecturer_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $data['subject_code'], $data['subject_name'], $data['sks'], $data['lecturer_id']);
        return $stmt->execute();
    }
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE subjects SET subject_code=?, subject_name=?, sks=?, lecturer_id=? WHERE id=?");
        $stmt->bind_param("ssiii", $data['subject_code'], $data['subject_name'], $data['sks'], $data['lecturer_id'], $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM subjects WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>