<?php 
include 'db.php';

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Use prepared statements for security [cite: 17]
    $stmt = mysqli_prepare($conn, "INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $course);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Student added successfully!</p>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
?>

<form method="POST">
    <label> Name: </label>
    <input type="text" name="name" required> <br><br>

    <label> Email: </label>
    <input type="email" name="email" required> <br><br>

    <label> Course: </label>
    <input type="text" name="course" required> <br><br>

    <button type="submit" name="submit"> Submit </button>
</form>
<a href="read.php">View Student List</a>