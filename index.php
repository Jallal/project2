<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/12/15
 * Time: 5:03 PM
 */
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new SudokuView($sudoku);
?>

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

<br>Enter the player name to start a new game:<br>
<form   name=username" action="game-post.php?username" method="post">
    <input type="text" name="name" placeholder="John" value="">
    <br>
    <input type="submit"  name ="username" value="Start">
</form>

    <a href="game-post.php?c">Cheat Mode</a>
</div>

</body>

</html>

