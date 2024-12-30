<?php
require_once "connection.php";

class Student {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Create a new student
    public function create($name, $class, $marks) {
        $sql = "INSERT INTO students (name, class, marks) VALUES (?, ?, ?)";
        $stmt = $this->db->conn->prepare($sql);
    
        if (!$stmt) {
            die("Error preparing statement: " . $this->conn->error);
        }
    
        $stmt->bind_param("ssi", $name, $class, $marks);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
    
        return true;
    }
    public function readAll() {
        $sql = "SELECT * FROM students";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    
    public function getById($id) {
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    
    public function update($id, $name, $class, $marks) {
        $sql = "UPDATE students SET name = ?, class = ?, marks = ? WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("ssii", $name, $class, $marks, $id);
        return $stmt->execute();
    }

   
    public function delete($id) {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
   
    
}
?>
