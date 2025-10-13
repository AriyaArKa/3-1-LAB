<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="reg.css">
</head>

<body>

    <?php

        // Write your code to insert data

    ?>


    <div class="container">
        <h2>User Registration Form</h2>

        <form action="reg.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

</body>

</html>