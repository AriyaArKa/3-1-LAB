<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See all users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container my-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('config.php');

                $sql = "SELECT * from users";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {

                    $id = $row["id"];
                    $name = $row["name"];
                    $age = $row["age"];

                    echo "<tr>
                    <th scope='row'>$id </th>
                    <td>$name</td>
                    <td>$age</td>
                    <td>
                        <a href='update.php?id=$id'>Update</a>
                        <a href='delete.php?id=$id'>Delete</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="index.php">Add a new user</a>

</body>

</html>