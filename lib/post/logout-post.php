<?php
require '../lib/game.inc.php';
unset($_SESSION['user']);
unset($_SESSION[SUDOKU_SESSION]);
header("location: ../index.php");