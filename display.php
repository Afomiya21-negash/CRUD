<?php
require_once "student.php";

$student = new Student();
// $students = $student->Insert();
$students = $student->readAll();

if ($students->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Class</th><th>Marks</th><th>Actions</th></tr>";
    while ($row = $students->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['class']) . "</td>";
        echo "<td>" . htmlspecialchars($row['marks']) . "</td>";
        echo "<td>
            <a href='edit_student.php?id=" . $row['id'] . "'>Edit</a> |
            <a href='delete_student.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure?');\">Delete</a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No students found.";
}
?>
