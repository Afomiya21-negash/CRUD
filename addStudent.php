<?php
require_once "student.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $marks = $_POST['marks'];

    $student = new Student();
    if ($student->create($name, $class, $marks)) {
        echo "Student added successfully!";
        header("Location:index.php");
    } else {
        echo "Failed to add student.";
    }
}
?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Class:</label>
    <input type="text" name="class" required>
    <br>
    <label>Marks:</label>
    <input type="number" name="marks" required>
    <br>
    <button type="submit">Add Student</button>
</form>
