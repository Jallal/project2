<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:00 PM
 */


require __DIR__ . "/autoload.inc.php";

$sudoku = new Sudoku();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($sudoku);
}

// Start the PHP session system
session_start();
define("SUDOKU_SESSION", 'sudoku');

$user = null;
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}


if(!isset($_SESSION[SUDOKU_SESSION])){
    $model = new SudokuModel(0000,$sudoku,$user);
    $_SESSION[SUDOKU_SESSION]= $model;
}

// redirect if user is not logged in
if(!isset($login) && $user === null) {
    $root = $sudoku->getRoot();
    header("location: $root/index.php");
    exit;
}

$GameSudoku = $_SESSION[SUDOKU_SESSION];