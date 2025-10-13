<?php
require_once('config.php');

// Check if form data was submitted properly
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['age'])) {
    // 1. Get form data safely
    $name = $_POST['name'];
    $age = $_POST['age'];
    
    // 2. Basic validation
    if (empty($name) || empty($age)) {
        echo "❌ Error: Please fill in all fields.";
    } else {
        $sql = "INSERT INTO users (name, age) VALUES ('$name', '$age')";
        
        if ($conn->query($sql) === TRUE) {
            echo "✅ Data inserted successfully!";
        } else {
            echo "❌ Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "❌ Error: No form data received. Please submit the form properly.";
}

// 4. Close connection
$conn->close();
?>

<br><br>
<a href="read.php">See all users</a> | <a href="index.php">Add another user</a>