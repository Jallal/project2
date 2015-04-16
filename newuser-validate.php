<?php
$login = false;
require_once "lib/game.inc.php";

$controller = new ValidationController($sudoku);
$msg = $controller->validate($_GET['v']);

header("location: index.php");
exit;