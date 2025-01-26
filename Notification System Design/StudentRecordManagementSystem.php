<?php
// Database Connection
$host = 'localhost';
$db = 'student_management';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        $email = $_POST['email'];
        $conn->query("INSERT INTO students (name, age, grade, email) VALUES ('$name', $age, '$grade', '$email')");
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        $email = $_POST['email'];
        $conn->query("UPDATE students SET name='$name', age=$age, grade='$grade', email='$email' WHERE id=$id");
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $conn->query("DELETE FROM students WHERE id=$id");
    }
}

// Fetch all records
$students = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>
    <h1>Student Record Management</h1>

    <!-- Add Student Form -->
    <form method="POST">
        <h2>Add New Student</h2>
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="grade" placeholder="Grade" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="add">Add Student</button>
    </form>

    <!-- Display All Students -->
    <h2>All Students</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $students->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['grade'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <!-- Edit Form -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="text" name="name" value="<?= $row['name'] ?>" required>
                        <input type="number" name="age" value="<?= $row['age'] ?>" required>
                        <input type="text" name="grade" value="<?= $row['grade'] ?>" required>
                        <input type="email" name="email" value="<?= $row['email'] ?>" required>
                        <button type="submit" name="edit">Edit</button>
                    </form>
                    <!-- Delete Form -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
