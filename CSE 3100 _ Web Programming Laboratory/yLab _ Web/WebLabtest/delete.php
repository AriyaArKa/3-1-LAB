<?php
require_once('config.php');

// Get user ID from URL
$id = $_GET['id'];

// Delete user directly
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "✅ User deleted successfully!<br>";
    echo "<a href='read.php'>Back to all users</a>";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
