<?php

class SudokuModel{
    private $game;
    private $answer;
    private $numNotes = 0;
    private $cells = array();
    private $user;

    public function __construct($gameNum=-1,$sudoku,$user) {
        $sudokuGame = new SudokuGame();

        if($gameNum == 0000){
                $loadgame=  new LoadSudokuGame($sudoku);
               $loadnotes=  new LoadUserNotes($sudoku);
            //change to the user id
               $loadgame->LoadGame('elhazzat');
                $notes = $loadnotes->LoadNotes('elhazzat');
                $this->game =  $loadgame->getSavedGame();
                $this->answer = $loadgame->getSavedAnswer();
            $this->constructCells($this->game,$this->answer);
            $this->addNotesFromdBase($notes);
            $this->addUserGuessFromdBase($loadgame->getUserGuess());

        }
        elseif ($gameNum == -1) {
            $games = $sudokuGame->getGames();
            $answers = $sudokuGame->getAnswers();
            $selection = rand(0,9);
            $this->game = $games[$selection];
            $this->answer = $answers[$selection];

            $this->constructCells($this->game,$this->answer);
        }
        elseif($gameNum == 11) {

            $this->game = $sudokuGame->getCheatGame();
            $this->answer = $sudokuGame->getCheatAnswer();

            $this->constructCells($this->game,$this->answer);
        }
        else {
            $games = $sudokuGame->getGames();
            $answers = $sudokuGame->getAnswers();
            $this->game = $games[$gameNum];
            $this->answer = $answers[$gameNum];

           $this->constructCells($this->game,$this->answer);
        }
    }

    public function constructCells($game,$answer)
    {
        for ($row = 0; $row < 9; $row++) {
            $oneRow = array();
            for ($column = 0; $column < 9; $column++) {
                $oneRow[] = new SudokuCell($answer[$row][$column], $row, $column, $game[$row][$column]);
            }
            $this->cells[] = $oneRow;
        }
    }


    public function getDefaultValue($row, $column) {
        return $this->cells[$row][$column]->getDefaultValue();
    }

    public function getCell($row, $column) {
        return $this->cells[$row][$column];
    }

    public function getAnswerForCell($row, $column) {
        return $this->cells[$row][$column]->getAnswer();
    }

    public function setUserGuessForCell($guess, $row, $column) {
        $cell = $this->cells[$row][$column];
        $cell->setUserGuess($guess);
        $this->game[$row][$column] = $guess;
        return $this->checkForWin();
    }

    private function checkForWin() {
        for ($row = 0; $row < 9; $row++) {
            if (!($this->game[$row] == $this->answer[$row])) {
                return false;
            }
        }

        return true;
    }

    public function isUserGuessCorrect($row, $column) {
        return $this->cells[$row][$column]->isUserGuessCorrect();
    }

    public function getUserGuessForCell($row, $column) {
        return $this->cells[$row][$column]->getUserGuess();
    }

    public function addNoteForCell($note, $row, $column) {
        $cell = $this->cells[$row][$column];
        $cell->addNote($note);
        $this->numNotes++;
    }

    public function getNotesForCell($row, $column) {
        return $this->cells[$row][$column]->getNotes();
    }

    public function getNumNotes() {
        return $this->numNotes;
    }



    public function getuser(){

        return $this->user;
    }

    public function getGame(){
        return  $this->game;

    }
    public function getAnswer(){
        return $this->answer;

    }


    public function setUser($User){
        $this->user=$User;

    }
    public function addNotesFromdBase($notes){
        foreach ($notes as $key=>$value) {
            foreach ($value as $key2=>$value2){

                foreach($notes[$key][$key2] as $note) {

                    $this->addNoteForCell($note,$key,$key2);
                }
            }
        }
    }

    public function addUserGuessFromdBase($guess){
        foreach ($guess as $key=>$value) {

            foreach ($value as $key2=>$value2){

                if($guess[$key][$key2]!==0){

                    $this->setUserGuessForCell($guess[$key][$key2], $key, $key2);
                }



            }

        }
    }





}