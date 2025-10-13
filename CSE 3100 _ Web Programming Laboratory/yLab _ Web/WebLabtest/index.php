<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
</head>

<body>
    <h2>Enter your details</h2>

    <form action="insert.php" method="post">
        <label>Name:</label>
        <input type="text" name="name" required maxlength="50">
        <br>
        <br>

        <label>Age:</label>
        <input type="number" name="age" required min="1" max="150">
        <br>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>