<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/12/15
 * Time: 5:04 PM
 */
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new SudokuView($GameSudoku);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sudoku game</title>
    <link rel="stylesheet" href="Sudoku.css" />
</head>

<body>
<?php echo present_header("Sudoku Game ", $user); ?>


<div class="cells">
    <?php
    echo $view->updatedStatus();
    ?>
</div>

<p><a href="post/game-post.php?c">Cheat Mode</a></p>

</body>
</html>



