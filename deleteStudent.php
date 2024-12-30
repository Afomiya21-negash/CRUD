<?php
require_once "student.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $student = new Student();
    if ($student->delete($id)) {
        echo "Student deleted successfully!";
    } else {
        echo "Failed to delete student.";
    }
}
?>
<a href="index.php">Back to Student List</a>
