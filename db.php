<?php
$conn = new mysqli('localhost', 'root', '', 'school_db');

// Check connection using the correct property: connect_error [cite: 9, 10]
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // This satisfies the requirement to display a success message 
    echo "Connection is successful";
}
?>