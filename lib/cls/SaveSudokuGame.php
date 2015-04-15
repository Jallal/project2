<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 4/11/15
 * Time: 3:14 PM
 */

class SaveSudokuGame extends Table {
     private  $model;
     private  $notes;
     private  $userID;
     private  $answer;
     private  $game;

    public function __construct($GameSudoku,$sudoku) {
        $this->model = $GameSudoku;
        parent::__construct($sudoku, "savedgame");


    }










    function processSave($userid){
        //$this->game =  $this->model->getGame();
        $this->answer = $this->model->getAnswer();
        //$this->default =  $this->model->getDefaultValue($row,$column);
        $this->userID  = $userid;
        $this->numNotes= $this->model->getNumNotes();

        if($this->GameExist($userid)){
            for ($row = 0; $row < 9; $row++) {
                for ($column = 0; $column < 9; $column++) {

                    $this->ReplaceGame($this->model->getDefaultValue($row,$column),$this->answer[$row][$column],$row,$column,$this->model->getUserGuessForCell($row,$column));

                }
            }
        }else{
            for ($row = 0; $row < 9; $row++) {
                for ($column = 0; $column < 9; $column++) {
                    $this->SaveGame($this->userID,$row,$column,$this->model->getDefaultValue($row,$column),$this->answer[$row][$column],$this->model->getUserGuessForCell($row,$column));
                }
            }


        }

    }

    /**
     * Ask the database for the user ID. If the user exists, the password
     * must match.
     * @param $pdo PHP Data Object
     * @param $user The user name
     * @param $password Password
     */
    function SaveGame($userid,$row,$column,$value,$answer,$guess) {


        $sql =<<<SQL
INSERT INTO $this->tableName(userid,ro,col,val,answer,guess) values(?,?,?,?,?,?)

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($userid,$row,$column,$value,$answer,$guess))){
            return true;
        }
        else{
            return false;
        }

    }

    function ReplaceGame($value,$answer,$row,$column,$guess) {
        $sql =<<<SQL
UPDATE $this->tableName
SET val =?,
answer=?,
guess=?
WHERE ro = ? AND col =?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($value,$answer,$guess,$row,$column))){
            return true;
        }
        else{
            return false;
        }

    }

    function GameExist($userid) {
        $sql =<<<SQL
SELECT * FROM $this->tableName

WHERE userid=?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));
        if($statement->rowCount()===0){
            return false;
        }
        else{
            return true;
        }

    }



}