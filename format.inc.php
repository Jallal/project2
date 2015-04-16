<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:01 PM
 */

function present_header($title, User $user) {
    $html = "<header>";
    $html .= "<nav><p><a href=\"post/game-post.php?m=Give up\">Give up</a></p>";

    if($user->getUserid() !== "guest") {
        $html .= '<p><a href="post/game-post.php?save">Save</a></p>';
        $html .= '<p><a href="post/logout-post.php">Logout</a></p>';
    } else {
        $html .= '<p><a href="post/logout-post.php">Logout of Guest</a></p>';
    }
    $html .= '</nav>';
    $html .= "<h1>$title</h1>";
    $html .= "</header>";

    return $html;
}