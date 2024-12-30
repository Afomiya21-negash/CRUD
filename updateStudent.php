<?php
require_once "student.php";

$student = new Student();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $studentData = $student->getById($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $marks = $_POST['marks'];

    if ($student->update($id, $name, $class, $marks)) {
        echo "Student updated successfully!";
        header("Location:index.php");
        
    } else {
        echo "Failed to update student.";
    }
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $studentData['id'] ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($studentData['name']) ?>" required>
    <br>
    <label>Class:</label>
    <input type="text" name="class" value="<?= htmlspecialchars($studentData['class']) ?>" required>
    <br>
    <label>Marks:</label>
    <input type="number" name="marks" value="<?= htmlspecialchars($studentData['marks']) ?>" required>
    <br>
    <button type="submit">Save Changes</button>
</form>
