<?php
require_once('config.php');

// Get user ID from URL
$id = $_GET['id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "UPDATE users SET name='$name', age='$age' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "✅ User updated successfully!<br>";
        echo "<a href='read.php'>Back to all users</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
} else {
    // Get current user data
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
</head>

<body>
    <?php if ($_SERVER["REQUEST_METHOD"] != "POST"): ?>
        <h2>Update User</h2>
        <form method="post">
            Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>
            Age: <input type="number" name="age" value="<?php echo $user['age']; ?>" required><br><br>
            <input type="submit" value="Update">
        </form>
        <br>
        <a href="read.php">Back to all users</a>
    <?php endif; ?>
</body>

</html>