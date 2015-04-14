<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:00 PM
 */


require __DIR__ . "/autoload.inc.php";
// Start the PHP session system
session_start();
define("SUDOKU_SESSION", 'sudoku');



$sudoku = new Sudoku();
$user = new User();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($sudoku);
}

if(!isset($_SESSION[SUDOKU_SESSION])){
    $model = new SudokuModel(-1,$sudoku,$user);
    $_SESSION[SUDOKU_SESSION]= $model;
}


$GameSudoku = $_SESSION[SUDOKU_SESSION];