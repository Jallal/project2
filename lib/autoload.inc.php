<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/20/15
 * Time: 8:59 PM
 */

/** @brief Autoload functionality
 * Classes are stored in the lib/cls directory with the extension .php
 */
spl_autoload_register(function($className) {
    $file = __DIR__ . '/cls/' . str_replace("\\", "/", $className) . '.php';
    if(is_file($file)) {
        include $file;
    }
});