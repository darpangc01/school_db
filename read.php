<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM students");
?>

<h2>Student List</h2>
<a href="create.php">Add New Student</a><br><br>

<table border="1" cellpadding="8" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['course']; ?></td>
        <td>
            <a href="update.php?id=<?= $row['id'] ?>">Edit</a> | 
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>