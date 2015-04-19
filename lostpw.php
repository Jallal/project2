<?php
$login = false;
require_once "lib/game.inc.php";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sightings Lost Password</title>
    <link href="Sudoku.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="login" class="guess-box">
    <p class="heading-2">Lost Password</p>
    <form method="post" action="post/lostpw-post.php" id="lostpass-form">
        <?php
        if(isset($_SESSION['lostpw-error'])) {
            echo "<p>" . $_SESSION['lostpw-error'] . "</p>";
            unset($_SESSION['lostpw-error']);
        }
        ?>
        <p>
            <label for="userid"></label>
            <input type="text" id="userid" name="userid" placeholder="Username" class="text-input"></p>
        <p>
            <label for="password1"></label>
            <input type="password" id="password1" name="password1" placeholder="New Password" class="text-input"></p>
        <p>
            <label for="password2"></label>
            <input type="password" id="password2" name="password2" placeholder="New Password (again)" class="text-input"></p>
        <p>
            <button form="lostpass-form" class="btn-large">Reset Password</button>
        </p>
    </form>
    <p class="index-links">
        <a href="index.php">Back to Login Page</a>
    </p>
</div>
</body>
</html>