<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 4/11/15
 * Time: 3:14 PM
 */

class LoadSudokuGame extends Table{
    private    $answer= array();  // Empty initial array
    private    $game= array();  // Empty initial array
    private    $guess = array();


    public function __construct(Sudoku $sudoku) {
        parent::__construct($sudoku, "savedgame");

    }

public function getSavedGame(){
    return $this->game;

}
public function getSavedAnswer(){
return $this->answer;
}
    public function getUserGuess(){
        return $this->guess;
    }


    function LoadGame($userid) {
        $sql =<<<SQL
SELECT * FROM $this->tableName
WHERE userid =?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));


        foreach($statement as $row) {
            $ro = (int)($row['ro']);
            $col = (int)($row['col']);
            $this->answer[$ro][$col]=(int)($row['answer']);
            $this->game[$ro][$col]=(int)($row['val']);
            $this->guess[$ro][$col]=(int)($row['guess']);

        }


    }
    function  GameExist($userid) {
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