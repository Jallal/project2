<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:01 PM
 */
require '../lib/game.inc.php';


$controller = new SudokuController($GameSudoku,$sudoku,$user,$_REQUEST);

if($controller->isReset()) {
    unset($_SESSION[SUDOKU_SESSION]);
}

if($controller->ischeatMode()){
    unset($_SESSION[SUDOKU_SESSION]);
    $_SESSION[SUDOKU_SESSION] = new SudokuModel(11,$sudoku,$user);
} elseif($controller->IsLoadfromdbase()){
    unset($_SESSION[SUDOKU_SESSION]);
    $_SESSION[SUDOKU_SESSION] = new SudokuModel(0,$sudoku,$user);
}
else{
    unset($_SESSION[SUDOKU_SESSION]);
    $_SESSION[SUDOKU_SESSION] = new SudokuModel(0,$sudoku,$user);
}


header("location: ../".$controller->getPage());

//phpinfo();
?>