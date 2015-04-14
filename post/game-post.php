<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:01 PM
 */
require '../lib/game.inc.php';


$controller = new SudokuController($GameSudoku,$sudoku,$_REQUEST);

if($controller->isReset()) {
    unset($_SESSION[SUDOKU_SESSION]);
    if ($controller->setUsername()) {
        $_SESSION['username'] = $_REQUEST['name'];
    }
}
elseif($controller->IsLoadfromdbase()){
    unset($_SESSION[SUDOKU_SESSION]);
    $_SESSION[SUDOKU_SESSION] = new SudokuModel(0000,$sudoku,$user);

}

elseif($controller->ischeatMode()){
    unset($_SESSION[SUDOKU_SESSION]);
    $_SESSION[SUDOKU_SESSION] = new SudokuModel(11,$sudoku,$user);
}

header("location: ../".$controller->getPage());

//phpinfo();
?>