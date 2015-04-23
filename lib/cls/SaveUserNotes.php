<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 4/14/15
 * Time: 6:02 PM
 */

class SaveUserNotes extends Table {
    private  $model;
    private  $userID;


    public function __construct($GameSudoku,$sudoku) {
        $this->model = $GameSudoku;
        parent::__construct($sudoku, "notes");


    }
    function processNotes($userid){
        if($this->NotesExist($userid)){

            $this->ClearNotes($userid);
        }

            for ($row = 0; $row < 9; $row++) {
                for ($column = 0; $column < 9; $column++) {
                    $note = $this->model->getNotesForCell($row, $column);
                    foreach($note as $value) {
                        $newnote = (int)$value;
                        $this->SaveNotes($newnote,$userid,$row,$column);
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
    function SaveNotes($note,$userid,$row,$column) {


        $sql =<<<SQL
INSERT INTO $this->tableName(note,userid,ro,col) values(?,?,?,?)

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($note,$userid,$row,$column))){
            return true;
        }
        else{
            return false;
        }

    }

    function ClearNotes($userid) {
        $sql =<<<SQL
DELETE FROM $this->tableName where userid=?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        if($statement->execute(array($userid))){
            return true;
        }
        else{
            return false;
        }

    }

    function NotesExist($userid) {
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