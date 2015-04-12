<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 4/11/15
 * Time: 3:14 PM
 */

class LoadSudokuGame extends Table{



    public function __construct(Sudoku $sudoku,$model,$user) {
        parent::__construct($sudoku, "savedgame");
        $this->model = $model;
        $this->user = $user;

    }


    /**
     * Process the query
     * @param $user the user to look for
     * @param $password the user password
     * @param $id the id in the hatting table
     */
    function processSave() {


    }

    /**
     * Ask the database for the user ID. If the user exists, the password
     * must match.
     * @param $pdo PHP Data Object
     * @param $user The user name
     * @param $password Password
     */
    function getUser() {


    }



}