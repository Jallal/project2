<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 4/11/15
 * Time: 3:14 PM
 */

class SaveSudokuGmae extends Table {
    private   $user;
     private  $model;
     private  $username;
     private  $answer;
     private  $game;





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

        $this->game =  $this->model->getGame();
        $this->answer = $this->model->getAnswer();
        $this->username = $this->model->getusername();
        $this->numNotes = $this->model->getNumNotes();

    }

    /**
     * Ask the database for the user ID. If the user exists, the password
     * must match.
     * @param $pdo PHP Data Object
     * @param $user The user name
     * @param $password Password
     */
    function SaveGame($user,$game,$answer,$notes) {


    }



}