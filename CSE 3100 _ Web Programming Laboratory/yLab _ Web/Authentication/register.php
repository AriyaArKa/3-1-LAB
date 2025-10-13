<?php

//session start
session_start();


$pageTitle = "Register Page";


//header
include 'includes/header.php';

//navbar
include 'includes/navbar.php';

//
$messageText = '';
$messageType = '';


//logical section
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    //validation
    // if (empty($email) || empty($password)) {
    //     echo "Please Fill the form";
    // }
    if (empty($email) || empty($password)) {
        $messageText = 'All fields are required';
        $messageType = 'danger';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messageText = 'Invalid email format';
        $messageType = 'danger';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $_SESSION["users"][$email] = $hashedPassword;

        $messageText = "Registration successful. You can login now.";
        $messageType = "success";
    }

    // $_SESSION["email"] = $email;
    // $_SESSION["password"] = $password;

    // print_r([$_SESSION["email"],$_SESSION["password"]]);

    // $_SESSION["users"][$email] = $password;

    // echo "Register Success";
}


?>


<!-- Registration form -->
<div class="row" mt-5>
    <div class="col-6 offset-md-3">

        <?php if ($messageText != '') { ?>
            <div class="alert alert-<?php echo $messageType ?> my-2" role="alert">
                <?php echo $messageText ?>
            </div>
        <?php } ?>

        <form method="POST" action="register.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>






<?php
//footer
include 'includes/footer.php';
?>