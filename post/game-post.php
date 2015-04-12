<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:01 PM
 */
require '../lib/game.inc.php';

$controller = new SudokuController($sudoku, $_REQUEST);

if($controller->isReset()) {
    unset($_SESSION[SUDOKU_SESSION]);
    if ($controller->setUsername()) {
        $_SESSION['username'] = $_REQUEST['name'];
    }
}

elseif($controller->ischeatMode()){
    unset($_SESSION[SUDOKU_SESSION]);
    $_SESSION[SUDOKU_SESSION] = new SudokuModel(11);
}

//echo"<p>" .$controller->getPage()."</p>";
header("location: ../".$controller->getPage());

//phpinfo();
?>