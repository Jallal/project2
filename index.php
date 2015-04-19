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

    <p class="heading-2">
        Login or Play as a Guest
    </p>
    <form method="post" action="post/login-post.php" id="login-form">
        <p>
            <input type="text" id="user" name="user" placeholder="Username or Email" class="text-input"></p>
        <p>
            <input type="password" id="password" name="password" placeholder="Password" class="text-input">
        </p>
        <p><button form="login-form" class="btn-large">Login</button></p>
    </form>

    <p class="index-links">
        <a href="post/login-post.php?guest">Play as a Guest</a> |
        <a href="newuser.php">New User</a> |
        <a href="lostpw.php">Forgot Password?</a>
    </p>
</div>

</body>

</html>

