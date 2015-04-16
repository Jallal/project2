<?php
$login = false;
require_once "../lib/game.inc.php";

unset($_SESSION['lostpw-error']);

$lp = new LostPw($sudoku);
$msg = $lp->newPw(
    strip_tags($_POST['userid']),
    strip_tags($_POST['password1']),
    strip_tags($_POST['password2']),
    new Email());

if($msg !== null) {
    $_SESSION['lostpw-error'] = $msg;
    header("location: ../lostpw.php");
    exit;
}

header("location: ../validating.php");
exit;