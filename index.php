<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sudoku game</title>
    <link rel="stylesheet" href="Sudoku.css" />
</head>

<body>

<h1>Welcome to our Sudoku Game!</h1>

<div class="guess-box">

    <br>Login or Play as a Guest:<br>
    <form method="post" action="post/login-post.php">
        <p>
            <label for="user">User name or Email:</label><br>
            <input type="text" id="user" name="user"></p>
        <p><label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
        </p>
        <p><input type="submit"></p>
    </form>

    <p><a href="newuser.php">New User</a></p>
    <p><a href="lostpw.php">Lost Password</a></p>
    <p><a href="post/login-post.php?guest">Play as a Guest</a></p>
</div>

</body>

</html>

