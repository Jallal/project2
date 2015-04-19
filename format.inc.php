<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:01 PM
 */

function present_header($title, User $user) {
    $html = "<header>";
    $html .= "<nav><a href=\"post/game-post.php?m=Give up\">Give up</a> | <a href='post/game-post.php?c'>Cheat Mode</a> | ";

    if($user->getUserid() !== "guest") {
        $html .= '<a href="post/game-post.php?save">Save</a> | ';
        $html .= '<a href="post/logout-post.php">Logout</a>';
    } else {
        $html .= '<a href="post/logout-post.php">Logout of Guest</a>';
    }
    $html .= '</nav>';
    $html .= "<h1>$title</h1>";
    $html .= "</header>";

    return $html;
}