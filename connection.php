<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "student_db";
    public $conn;
    public function __construct() {
     $this->connect();
     $this->createDatabase();
     $this->createTables();
 }

 private function connect() {
     $this->conn = new mysqli($this->host, $this->user, $this->password);

     // Check connection
     if ($this->conn->connect_error) {
         die("Connection failed: " . $this->conn->connect_error);
     }
 }

 private function createDatabase() {
     $sql = "CREATE DATABASE IF NOT EXISTS $this->dbName";
     if ($this->conn->query($sql) === TRUE) {
         // echo "Database created successfully or already exists.<br>";
     } else {
         die("Error creating database: " . $this->conn->error);
     }

     $this->conn->select_db($this->dbName);
 }
 private function createTables() {

     $sql = "CREATE TABLE IF NOT EXISTS students (
          id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    class VARCHAR(50) NOT NULL,
    marks INT NOT NULL
      )";

      if ($this->conn->query($sql) === TRUE) {
          // echo "Table `studnets` created successfully or already exists.<br>";
      } else {
          die("Error creating table: " . $this->conn->error);
      }
 }

}
?>
