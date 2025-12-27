<?php
include 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $update_stmt = mysqli_prepare($conn, "UPDATE students SET name=?, email=?, course=? WHERE id=?");
    mysqli_stmt_bind_param($update_stmt, "sssi", $name, $email, $course, $id);

    if (mysqli_stmt_execute($update_stmt)) {
        header("Location: read.php");
        exit;
    }
}

// Fetch current data to populate form
$stmt = mysqli_prepare($conn, "SELECT * FROM students WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>

<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required><br>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required><br>
    <input type="text" name="course" value="<?= htmlspecialchars($data['course']) ?>" required><br>
    <button type="submit">Update</button>
</form>