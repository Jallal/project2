<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/23/15
 * Time: 6:08 PM
 */
require 'lib/game.inc.php';
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sudoku</title>
    <link rel="stylesheet" href="Sudoku.css" />
</head>

<body>

    <div class="guess-box">
            <p class="heading-2">Cell Guess</p>
        <form   name=userinput" action="post/game-post.php" method="post" id="cellguess-form">
            Enter value for cell, 0 to make the cell blank<br>
            <input type="text" name="cell_value" placeholder="0-9" value="" class="text-input">
            <input type="hidden" name="x" value="<?php echo $_GET['x']; ?>">
            <input type="hidden" name="y" value="<?php echo $_GET['y']; ?>">
        <br><br>
            <button form="cellguess-form" class="btn-large">Guess</button>
<hr>
        <br>Enter a note for cell<br>
        <form   name=usernotes" action="post/game-post.php" method="post" id="cellnote-form">
        <input type="text" name="cell_note" placeholder="1-9" value="" class="text-input">
        <input type="hidden" name="x" value="<?php echo $_GET['x']; ?>">
        <input type="hidden" name="y" value="<?php echo $_GET['y']; ?>">
        <br>
        <br>

            <button form="cellnote-form" class="btn-large">Add Note</button>
        </form>
            <p class="index-links">
                <a href="game.php">Back to Game</a>
            </p>
    </div>

</body>
</html>
