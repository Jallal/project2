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
    <h2>Lost Password</h2>
    <form method="post" action="post/lostpw-post.php">
        <?php
        if(isset($_SESSION['lostpw-error'])) {
            echo "<p>" . $_SESSION['lostpw-error'] . "</p>";
            unset($_SESSION['lostpw-error']);
        }
        ?>
        <p>
            <label for="userid">User ID:</label><br>
            <input type="text" id="userid" name="userid"></p>
        <p>
            <label for="password1">New Password:</label><br>
            <input type="password" id="password1" name="password1"></p>
        <p>
            <label for="password2">New Password (again):</label><br>
            <input type="password" id="password2" name="password2"></p>
        <p><input type="submit"></p>
    </form>
    <a href="index.php">Back to login page</a>
</div>
</body>
</html>