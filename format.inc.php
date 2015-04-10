<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 9:01 PM
 */

function present_header($title) {
    $html = "<header>";
    $html .= "<nav><p><a href=\"game-post.php?m=Give up\">Give up </a></p></nav>";
    $html .= "<h1>$title</h1>";
    $html .= "</header>";

    return $html;
}