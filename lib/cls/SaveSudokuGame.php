<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 4/11/15
 * Time: 3:14 PM
 */

class SaveSudokuGame extends Table {
     private  $model;
     private  $userID;
     private  $answer;
     private  $game;

    public function __construct($GameSudoku,$sudoku) {
        $this->model = $GameSudoku;
        parent::__construct($sudoku, "savedgame");


    }


    function processSave($userid){
        $this->game =  $this->model->getGame();
        $this->answer = $this->model->getAnswer();
        $this->userID  = $userid;
        $this->numNotes= $this->model->getNumNotes();

        if($this->GameExist($userid)){
            for ($row = 0; $row < 9; $row++) {
                for ($column = 0; $column < 9; $column++) {
                    $this->ReplaceGame($this->game[$row][$column],$this->answer[$row][$column],$row,$column);

                }
            }
        }else{
            for ($row = 0; $row < 9; $row++) {
                for ($column = 0; $column < 9; $column++) {
                    $this->SaveGame($this->userID,$row,$column,$this->game[$row][$column],$this->answer[$row][$column]);
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
    function SaveGame($userid,$row,$column,$value,$answer) {


        $sql =<<<SQL
INSERT INTO $this->tableName(userid,ro,col,val,answer) values(?,?,?,?,?)

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($userid,$row,$column,$value,$answer))){
            return true;
        }
        else{
            return false;
        }

    }

    function ReplaceGame($value,$answer,$row,$column) {
        $sql =<<<SQL
UPDATE $this->tableName
SET val =?,
answer=?
WHERE ro = ? AND col =?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($value,$answer,$row,$column))){
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