<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/12/15
 * Time: 5:04 PM
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
<header>
    <nav>
        <p>
            <a href="game-post.php?n">New Game</a>
        </p>
    </nav>
</header>

<h1>Congratulations <?php echo $view->playerName(); ?> you've finished the puzzle.</h1>
<h1>Number of notes used: <?php echo $view->numberOfNotes(); ?></h1>


<br>
<br>
<div class="cells">

    <?php
    echo $view->showAnswer();
    ?>

</div>
