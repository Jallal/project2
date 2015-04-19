<?php
$login = false;
require_once "lib/game.inc.php";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>New Sudoku User</title>
    <link rel="stylesheet" href="Sudoku.css" />
</head>
<body>

<div id="login" class="guess-box">
    <p class="heading-2">New User Registration</p>
    <form method="post" action="post/newuser-post.php" id="register-form">
        <?php
        if(isset($_SESSION['newuser-error'])) {
            echo "<p>" . $_SESSION['newuser-error'] . "</p>";
            unset($_SESSION['newuser-error']);
        }
        ?>
        <p>
            <label for="userid"></label>
            <input type="text" id="userid" name="userid" placeholder="Username" class="text-input"></p>
        <p>
            <label for="name"></label>
            <input type="text" id="name" name="name" placeholder="First Name" class="text-input"></p>
        <p>
            <label for="email"></label>
            <input type="text" id="email" name="email" placeholder="Email" class="text-input"></p>
        <p>
            <label for="password1"></label>
            <input type="password" id="password1" name="password1" placeholder="Password" class="text-input"></p>
        <p>
            <label for="password2"></label>
            <input type="password" id="password2" name="password2" placeholder="Password (again)" class="text-input"></p>
        <p>
            <label for="secret"></label>
            <input type="password" id="secret" name="secret" placeholder="Secret" class="text-input"></p>
        <p>
            <button form="register-form" class="btn-large">Register</button>
        </p>
    </form>
    <p class="index-links">
        <a href="index.php">Back to Home Page</a>
    </p>
</div>
</body>
</html>