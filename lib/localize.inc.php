<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 3/5/15
 * Time: 1:18 PM
 */

/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Sudoku $sudoku) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');
    $sudoku->setEmail('elhazzat@cse.msu.edu');
    $sudoku->setRoot('/~elhazzat/project2');
    $sudoku->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=elhazzat',
        'elhazzat',       // Database user
        'superstudent',     // Database password
        'sudoku_');            // Table prefix


};