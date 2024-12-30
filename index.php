<?php
require_once "student.php";

$student = new Student();


$students = $student->readAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portfolio</title>
    <style>
     
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <?php if ($students->num_rows > 0): ?>
        <section id="dynamic-content">
            <h2>Student Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Marks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $students->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['class']) ?></td>
                            <td><?= htmlspecialchars($row['marks']) ?></td>
                            <td>
                                <a href="updateStudent.php?id=<?= $row['id'] ?>">Edit</a> |
                                <a href="deleteStudent.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                <a href="addStudent.php?id=<?= $row['id'] ?>"><button>Add student</button></a> |
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    <?php endif; ?>

   
</body>
</html>
