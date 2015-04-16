<?php
$login = true;
require '../lib/game.inc.php';

if(isset($_GET['guest'])) {
    $row = array('id' => 0,
        'userid' => 'guest',
        'email' => '',
        'password' => '',
        'joined' => '');
    $user = new User($row);
    $_SESSION['user'] = $user;
    header("location: ../game.php");
    exit;
}

if(isset($_POST['user']) && isset($_POST['password'])) {
    $users = new Users($sudoku);

    $user = $users->login($_POST['user'], $_POST['password']);
    if($user !== null) {
        $_SESSION['user'] = $user;
        header("location: ../game.php");
        exit;
    }
}

header("location: ../index.php");