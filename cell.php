<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/23/15
 * Time: 6:08 PM
 */
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sudoku</title>
    <link rel="stylesheet" href="Sudoku.css" />
</head>

<body>


<h1>Cell Guess</h1>


    <div class="guess-box">
    <form   name=userinput" action="game-post.php" method="post">
        Enter value for cell, 0 to make the cell blank:<br>
        <input type="text" name="cell_value" placeholder="0-9" value="">
        <input type="hidden" name="x" value="<?php echo $_GET['x']; ?>">
        <input type="hidden" name="y" value="<?php echo $_GET['y']; ?>">
    <br><br>
    <input type="submit"  name ="submit_button" value="Add Guess">

    <br>Enter a note for cell:<br>
    <form   name=usernotes" action="game-post.php" method="post">
    <input type="text" name="cell_note" placeholder="1-9" value="">
    <input type="hidden" name="x" value="<?php echo $_GET['x']; ?>">
    <input type="hidden" name="y" value="<?php echo $_GET['y']; ?>">
    <br>
    <br>
    <input type="submit"  name ="note_button" value="Add Note">
    </form>
    </div>

</body>
</html>
